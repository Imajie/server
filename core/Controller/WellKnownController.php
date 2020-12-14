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

namespace OC\Core\Controller;

use OC\Http\WellKnownManager;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\Response;
use OCP\IRequest;

class WellKnownController extends Controller {

	/** @var WellKnownManager */
	private WellKnownManager $wellKnownManager;

	public function __construct(IRequest $request,
								WellKnownManager $wellKnownManager) {
		parent::__construct('core', $request);
		$this->wellKnownManager = $wellKnownManager;
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 *
	 * @return Response
	 */
	public function handle(string $service): Response {
		$response = $this->wellKnownManager->process(
			$service,
			$this->request
		);

		if ($response === null) {
			return new JSONResponse("$service not supported", Http::STATUS_NOT_FOUND);
		}

		return $response;
	}
}
