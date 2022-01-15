# Elastica version issue

## Requirements

- PHP 7.2+
- ElasticSearch 7.x

## How to run the test case

Run an ElasticSearch instance on port 9201.
A docker image is provided (`docker-compose up`).

Run `composer install`
Run `./vendor/bin/phpunit tests`

Failing test feedback:
```
1) DocumentManagementTest::testAddingDocumentToAliasIndex
Elastica\Exception\ResponseException: Validation Failed: 1: internal versioning can not be used for optimistic concurrency control. Please use `if_seq_no` and `if_primary_term` instead;
```
