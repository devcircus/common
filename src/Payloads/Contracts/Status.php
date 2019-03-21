<?php

namespace BrightComponents\Common\Payloads\Contracts;

interface Status
{
    const STATUS_CONTINUE = 'Continue';                                                         // 100
    const STATUS_SWITCHING_PROTOCOLS = 'Switching Protocols';                                   // 101
    const STATUS_PROCESSING = 'Processing';                                                     // 102
    const STATUS_OK = 'OK';                                                                     // 200
    const STATUS_CREATED = 'Created';                                                           // 201
    const STATUS_ACCEPTED = 'Accepted';                                                         // 202
    const STATUS_NON_AUTHORITATIVE_INFORMATION = 'Non-Authoritative Information';               // 203
    const STATUS_NO_CONTENT = 'No Content';                                                     // 204
    const STATUS_RESET_CONTENT = 'Reset Content';                                               // 205
    const STATUS_PARTIAL_CONTENT = 'Partial Content';                                           // 206
    const STATUS_MULTI_STATUS = 'Multi-Status';                                                 // 207
    const STATUS_ALREADY_REPORTED = 'Already Reported';                                         // 208
    const STATUS_IM_USED = 'IM Used';                                                           // 226
    const STATUS_MULTIPLE_CHOICES = 'Multiple Choices';                                         // 300
    const STATUS_MOVED_PERMANENTLY = 'Moved Permanently';                                       // 301
    const STATUS_FOUND = 'Found';                                                               // 302
    const STATUS_SEE_OTHER = 'See Other';                                                       // 303
    const STATUS_NOT_MODIFIED = 'Not Modified';                                                 // 304
    const STATUS_USE_PROXY = 'Use Proxy';                                                       // 305
    const STATUS_TEMPORARY_REDIRECT = 'Temporary Redirect';                                     // 307
    const STATUS_PERMANENT_REDIRECT = 'Permanent Redirect';                                     // 308
    const STATUS_BAD_REQUEST = 'Bad Request';                                                   // 400
    const STATUS_UNAUTHORIZED = 'Unauthorized';                                                 // 401
    const STATUS_PAYMENT_REQUIRED = 'Payment Required';                                         // 402
    const STATUS_FORBIDDEN = 'Forbidden';                                                       // 403
    const STATUS_NOT_FOUND = 'Not Found';                                                       // 404
    const STATUS_METHOD_NOT_ALLOWED = 'Method Not Allowed';                                     // 405
    const STATUS_NOT_ACCEPTABLE = 'Not Acceptable';                                             // 406
    const STATUS_PROXY_AUTHENTICATION_REQUIRED = 'Proxy Authentication Required';               // 407
    const STATUS_REQUEST_TIMEOUT = 'Request Timeout';                                           // 408
    const STATUS_CONFLICT = 'Conflict';                                                         // 409
    const STATUS_GONE = 'Gone';                                                                 // 410
    const STATUS_LENGTH_REQUIRED = 'Length Required';                                           // 411
    const STATUS_PRECONDITION_FAILED = 'Precondition Failed';                                   // 412
    const STATUS_PAYLOAD_TOO_LARGE = 'Payload Too Large';                                       // 413
    const STATUS_URI_TOO_LONG = 'URI Too Long';                                                 // 414
    const STATUS_UNSUPPORTED_MEDIA_TYPE = 'Unsupported Media Type';                             // 415
    const STATUS_RANGE_NOT_SATISFIABLE = 'Range Not Satisfiable';                               // 416
    const STATUS_EXPECTATION_FAILED = 'Expectation Failed';                                     // 417
    const STATUS_IM_A_TEAPOT = "I'm a teapot";                                                  // 418
    const STATUS_MISDIRECTED_REQUEST = 'Misdirected Request';                                   // 421
    const STATUS_UNPROCESSABLE_ENTITY = 'Unprocessable Entity';                                 // 422
    const STATUS_LOCKED = 'Locked';                                                             // 423
    const STATUS_FAILED_DEPENDENCY = 'Failed Dependency';                                       // 424
    const STATUS_UPGRADE_REQUIRED = 'Upgrade Required';                                         // 426
    const STATUS_PRECONDITION_REQUIRED = 'Precondition Required';                               // 428
    const STATUS_TOO_MANY_REQUESTS = 'Too Many Requests';                                       // 429
    const STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE = 'Request Header Fields Too Large';           // 431
    const STATUS_CONNECTION_CLOSED_WITHOUT_RESPONSE = 'Connection Closed Without Response';     // 444
    const STATUS_UNAVAILABLE_FOR_LEGAL_REASONS = 'Unavailable For Legal Reasons';               // 451
    const STATUS_CLIENT_CLOSED_REQUEST = 'Client Closed Request';                               // 499
    const STATUS_INTERNAL_SERVER_ERROR = 'Internal Server Error';                               // 500
    const STATUS_NOT_IMPLEMENTED = 'Not Implemented';                                           // 501
    const STATUS_BAD_GATEWAY = 'Bad Gateway';                                                   // 502
    const STATUS_SERVICE_UNAVAILABLE = 'Service Unavailable';                                   // 503
    const STATUS_GATEWAY_TIMEOUT = 'Gateway Timeout';                                           // 504
    const STATUS_VERSION_NOT_SUPPORTED = 'HTTP Version Not Supported';                          // 505
    const STATUS_VARIANT_ALSO_NEGOTIATES = 'Variant Also Negotiates';                           // 506
    const STATUS_INSUFFICIENT_STORAGE = 'Insufficient Storage';                                 // 507
    const STATUS_LOOP_DETECTED = 'Loop Detected';                                               // 508
    const STATUS_NOT_EXTENDED = 'Not Extended';                                                 // 510
    const STATUS_NETWORK_AUTHENTICATION_REQUIRED = 'Network Authentication Required';           // 511
    const STATUS_NETWORK_CONNECT_TIMEOUT_ERROR = 'Network Connect Timeout Error';               // 599
}
