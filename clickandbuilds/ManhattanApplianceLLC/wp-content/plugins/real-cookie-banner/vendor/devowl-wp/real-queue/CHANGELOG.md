# Change Log

All notable changes to this project will be documented in this file.
See [Conventional Commits](https://conventionalcommits.org) for commit guidelines.

## 0.2.3 (2021-09-08)


### fix

* queue hangs on 1% in Real Cookie Banner plugin (CU-11eccpg)





## 0.2.2 (2021-08-20)


### chore

* update PHP dependencies





## 0.2.1 (2021-08-11)


### fix

* timeout for websites with more than 30,000 sites to scan (database table could not be cleared correctly)





# 0.2.0 (2021-08-10)


### chore

* translations into German (CU-pb8dpn)


### feat

* add new checklist item to scan the website (CU-mk8ec0)
* allow to fetch queue status and delete jobs by type (CU-m57phr)
* initial commit with working server-worker queue (CU-kh49jp)
* introduce client worker and localStorage restore functionality (CU-kh49jp)
* introduce new event to modify job delay depending on idle state
* introduce new JobDone event
* prepare new functionalities for the initial release (CU-kh49jp)
* proper error handling with UI when e.g. the Real Cookie Banner scanner fails (CU-7mvhak)


### fix

* automatically refresh jobs if queue is empty and there are still remaining items
* be more loose when getting and parsing the sitemap
* do not add duplicate URLs to queue
* do not enqueue real-queue on frontend for logged-in users
* localStorage per WordPress instance to be MU compatible
* only run one queue per browser session
* review 1 (CU-mtdp7v, CU-n1f1xc)
* review 1 (CU-nd8ep0)
* review 2 (CU-7mvhak)
* review user tests #2 (CU-nvafz0)
* tab locking did not work as expected and introduced worker notifications


### perf

* speed up scan process by reducing server requests (CU-nvafz0)


### refactor

* split i18n and request methods to save bundle size
