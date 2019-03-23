# Changelog

All notable changes to BrightComponents/Common will be documented in this file

## 0.1.0 - 2018-07-03

-   Initial release

## 0.1.1 - 2018-07-03

-   Add status to payload.

## 0.1.2 - 2018-07-03

-   Revert addition of status.

## 0.1.3 - 2018-07-07

-   Add CustomRule abstract class.

## 0.1.4 - 2018-07-07

-   Revert addition of CustomRule class.

## 1.0.0-beta.1 - 2018-09-02

-   First beta release. Features locked.

## 1.0.0-beta.1.1 - 2018-09-05

-   Upgrade illuminate/support dependency to 5.7. Bump PHP version.

## 1.0.0-beta.1.2 - 2019-02-28

-   Update for compatibility with Laravel 5.8

## 1.0.0-beta.1.3 - 2019-03-21

-   Update Payload class to a more complete version.

## 1.0.0-beta.1.4 - 2019-03-21

-   Correct Payload class to "implement" contract, not extend.

## 1.0.0-beta.1.5 - 2019-03-21

-   Handle the case when a collection is passed to the payload.

## 1.0.0-beta.1.6 - 2019-03-21

-   Add optional wrapper for payload output.
-   Add setter for wrapper.

## 1.0.0-beta.1.7 - 2019-03-21

-   Update interface for payload.

## 1.0.0-beta.1.8 - 2019-03-23

-   Enable easier converting of payloads to responses.
    -   Add wrapper keys for payload output, input, and messages.
    -   Add Response macros for returning json response with payload and returning a view response with payload.

## 1.0.0-beta.1.9 - 2019-03-23

-   Optionally add payload input to response.

## 1.0.0-beta.2.0 - 2019-03-23

-   Make HTTP status codes ints instead of strings.
-   Start review of code, preparing for 1.0 release.

## 1.0.0 - 2019-03-23

-   Initial stable release.
