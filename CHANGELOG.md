CHANGELOG
=========

Notable changes will be documented in this file. The project adheres to [Semantic Versioning].

Unreleased
----------

* Removed not used `t3v_translations` dependency

2.0.0
-----

* Changed hook from `contentPostProc-output` to `contentPostProc-all`
* Support for TYPO3 10.4 and up via middleware
* Dropped support for TYPO3 9.5 (breaking change)
* Dropped support for PHP < 7.4 (breaking change)
* Updated Travis CI configuration
* Dropped support for AppVeyor

1.0.0
-----

* Added `ContentPostProcOutputHook`
* Added `Functional` and `Unit` tests
* Added common files
* First release

[Semantic Versioning]: http://semver.org "Semantic Versioning"
