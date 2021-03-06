<?php

define('NET_SFTP_INIT', 1);
define('NET_SFTP_VERSION', 2);
define('NET_SFTP_OPEN', 3);
define('NET_SFTP_CLOSE', 4);
define('NET_SFTP_READ', 5);
define('NET_SFTP_WRITE', 6);
define('NET_SFTP_LSTAT', 7);
define('NET_SFTP_SETSTAT', 9);
define('NET_SFTP_OPENDIR', 11);
define('NET_SFTP_READDIR', 12);
define('NET_SFTP_REMOVE', 13);
define('NET_SFTP_MKDIR', 14);
define('NET_SFTP_RMDIR', 15);
define('NET_SFTP_REALPATH', 16);
define('NET_SFTP_STAT', 17);
define('NET_SFTP_RENAME', 18);
define('NET_SFTP_READLINK', 19);
define('NET_SFTP_SYMLINK', 20);

define('NET_SFTP_STATUS', 101);
define('NET_SFTP_HANDLE', 102);
define('NET_SFTP_DATA', 103);
define('NET_SFTP_NAME', 104);
define('NET_SFTP_ATTRS', 105);
define('NET_SFTP_EXTENDED', 200);

define('NET_SFTP_STATUS_OK', 0);
define('NET_SFTP_STATUS_EOF', 1);
define('NET_SFTP_STATUS_NO_SUCH_FILE', 2);
define('NET_SFTP_STATUS_PERMISSION_DENIED', 3);
define('NET_SFTP_STATUS_FAILURE', 4);
define('NET_SFTP_STATUS_BAD_MESSAGE', 5);
define('NET_SFTP_STATUS_NO_CONNECTION', 6);
define('NET_SFTP_STATUS_CONNECTION_LOST', 7);
define('NET_SFTP_STATUS_OP_UNSUPPORTED', 8);
define('NET_SFTP_STATUS_INVALID_HANDLE', 9);
define('NET_SFTP_STATUS_NO_SUCH_PATH', 10);
define('NET_SFTP_STATUS_FILE_ALREADY_EXISTS', 11);
define('NET_SFTP_STATUS_WRITE_PROTECT', 12);
define('NET_SFTP_STATUS_NO_MEDIA', 13);
define('NET_SFTP_STATUS_NO_SPACE_ON_FILESYSTEM', 14);
define('NET_SFTP_STATUS_QUOTA_EXCEEDED', 15);
define('NET_SFTP_STATUS_UNKNOWN_PRINCIPAL', 16);
define('NET_SFTP_STATUS_LOCK_CONFLICT', 17);
define('NET_SFTP_STATUS_DIR_NOT_EMPTY', 18);
define('NET_SFTP_STATUS_NOT_A_DIRECTORY', 19);
define('NET_SFTP_STATUS_INVALID_FILENAME', 20);
define('NET_SFTP_STATUS_LINK_LOOP', 21);
define('NET_SFTP_STATUS_CANNOT_DELETE', 22);
define('NET_SFTP_STATUS_INVALID_PARAMETER', 23);
define('NET_SFTP_STATUS_FILE_IS_A_DIRECTORY', 24);
define('NET_SFTP_STATUS_BYTE_RANGE_LOCK_CONFLICT', 25);
define('NET_SFTP_STATUS_BYTE_RANGE_LOCK_REFUSED', 26);
define('NET_SFTP_STATUS_DELETE_PENDING', 27);
define('NET_SFTP_STATUS_FILE_CORRUPT', 28);
define('NET_SFTP_STATUS_OWNER_INVALID', 29);
define('NET_SFTP_STATUS_GROUP_INVALID', 30);
define('NET_SFTP_STATUS_NO_MATCHING_BYTE_RANGE_LOCK', 31);

define('NET_SFTP_ATTR_SIZE', 0x00000001);
define('NET_SFTP_ATTR_UIDGID', 0x00000002);
define('NET_SFTP_ATTR_PERMISSIONS', 0x00000004);
define('NET_SFTP_ATTR_ACCESSTIME', 0x00000008);
define('NET_SFTP_ATTR_EXTENDED', (-1 << 31) & 0xFFFFFFFF);

define('NET_SFTP_OPEN_READ', 0x00000001);
define('NET_SFTP_OPEN_WRITE', 0x00000002);
define('NET_SFTP_OPEN_APPEND', 0x00000004);
define('NET_SFTP_OPEN_CREATE', 0x00000008);
define('NET_SFTP_OPEN_TRUNCATE', 0x00000010);
define('NET_SFTP_OPEN_EXCL', 0x00000020);

define('NET_SFTP_TYPE_REGULAR', 1);
define('NET_SFTP_TYPE_DIRECTORY', 2);
define('NET_SFTP_TYPE_SYMLINK', 3);
define('NET_SFTP_TYPE_SPECIAL', 4);
define('NET_SFTP_TYPE_UNKNOWN', 5);
define('NET_SFTP_TYPE_SOCKET', 6);
define('NET_SFTP_TYPE_CHAR_DEVICE', 7);
define('NET_SFTP_TYPE_BLOCK_DEVICE', 8);
define('NET_SFTP_TYPE_FIFO', 9);
