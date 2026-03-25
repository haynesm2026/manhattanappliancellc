# Change Log

All notable changes to this project will be documented in this file.
See [Conventional Commits](https://conventionalcommits.org) for commit guidelines.

## 0.2.3 (2021-08-20)


### chore

* update PHP dependencies





## 0.2.2 (2021-08-10)

**Note:** This package (@devowl-wp/tcf-vendor-list-normalize) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.1 (2021-05-25)


### chore

* migarte loose mode to compiler assumptions





# 0.2.0 (2021-05-11)


### feat

* allow to query a single vendor (CU-crwq2r)
* allow to query multiple vendors with the in-argument (CU-ff0zhy)
* allow to return only declarations instead of with metadata (onlyReturnDeclarations, CU-ff0z49)
* compatibility with TCF v2.1 (device storage disclosures, CU-h74vna)
* download and normalize Global Vendor List for TCF compatibility (CU-63ty1t)
* introduce query class to read purposes and vendors (CU-crwq2r)
* persist and query stacks, and calculate best suitable stacks for a given set of declarations (CU-fh0bx6)


### fix

* localize stacks correctly and sort by score (CU-ff0zhy)
* map used declarations to own array instead of removing purposes from original vendor (CU-ff0yvh)
* notices thrown when no vendor given (CU-ff0yvh)
* review 1 (TCF, CU-ff0yck)
* review 2 (CU-ff0yvh)
* review TCF CMP validator (CU-hh395u, CU-hh3dkn)
* use correct language as requested (CU-crwwdx)


### refactor

* create wp-webpack package for WordPress packages and plugins
* introduce eslint-config package
* introduce new grunt workspaces package for monolithic usage
* introduce new package to validate composer licenses and generate disclaimer
* introduce new package to validate yarn licenses and generate disclaimer
* introduce new script to run-yarn-children commands
* move build scripts to proper backend and WP package
* move jest scripts to proper backend and WP package
* move PHP Unit bootstrap file to @devowl-wp/utils package
* move PHPUnit and Cypress scripts to @devowl-wp/utils package
* move WP build process to @devowl-wp/utils
* move WP i18n scripts to @devowl-wp/utils
* move WP specific typescript config to @devowl-wp/wp-webpack package
* remove @devowl-wp/development package
