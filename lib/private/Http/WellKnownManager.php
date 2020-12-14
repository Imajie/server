<?php

declare(strict_types=1);

/*
 * @copyright 2020 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @author 2020 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OC\Http;

use OC\AppFramework\Bootstrap\Coordinator;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\Response;
use OCP\AppFramework\QueryException;
use OCP\Http\IWellKnownContext;
use OCP\Http\IWellKnownHandler;
use OCP\IRequest;
use OCP\IServerContainer;
use Psr\Log\LoggerInterface;
use RuntimeException;

class WellKnownManager {

	/** @var Coordinator */
	private Coordinator $coordinator;

	/** @var IServerContainer */
	private IServerContainer $container;

	/** @var LoggerInterface */
	private LoggerInterface $logger;

	public function __construct(Coordinator $coordinator,
								IServerContainer $container,
								LoggerInterface $logger) {
		$this->coordinator = $coordinator;
		$this->container = $container;
		$this->logger = $logger;
	}

	public function process(string $service, IRequest $request): ?Response {
		$handlers = $this->loadHandlers();
		$context = new class($request) implements IWellKnownContext {
			/** @var IRequest */
			private IRequest $request;

			public function __construct(IRequest $request) {
				$this->request = $request;
			}

			public function getRequest(): IRequest {
				return $this->request;
			}
		};
		$handlers[] = new class implements IWellKnownHandler {
			public function handle(string $service, IWellKnownContext $context): ?Response {
				return new JSONResponse(['hello' => 3, 'other' => $service]);
			}
		};

		foreach ($handlers as $handler) {
			$response = $handler->handle($service, $context);

			if ($response !== null) {
				return $response;
			}
		}

		return null;
	}

	/**
	 * @return IWellKnownHandler[]
	 */
	private function loadHandlers(): array {
		$context = $this->coordinator->getRegistrationContext();

		if ($context === null) {
			throw new RuntimeException("Well known handlers requested before the apps had been fully registered");
		}

		return array_filter(
			array_map(function (array $registration) {
				$class = $registration['class'];

				try {
					$handler = $this->container->get($class);

					if (!($handler) instanceof IWellKnownHandler) {
						$this->logger->error("Well known handler $class is invalid");

						return null;
					}

					return $handler;
				} catch (QueryException $e) {
					$this->logger->error("Could not load well known handler $class", [
						'exception' => $e,
					]);

					return null;
				}
			}, $context->getWellKnownHandlers())
		);
	}
}
