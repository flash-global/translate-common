# Service Translate - Common

[![GitHub release](https://img.shields.io/github/release/flash-global/translate-common.svg?style=for-the-badge)](README.md)

## Table of contents
- [Entities](#entities)
- [Contribution](#contribution)

## Entities

### I18nString entity

In addition to traditional `id` and `createdAt` fields, I18nString entity has **four** important properties:

| Properties    | Type              | Required | Default value |
|---------------|-------------------|----------|---------------|
| id            | `integer`         | No       |               |
| createdAt     | `datetime`        | No       | Now()              |
| lang             | `string`          | Yes       |               |
| key           | `string`          | Yes       |               |
| namespace     | `string`         | Yes       |               |
| content       | `string`         | Yes       |               |
 
* `lang` is a string indicating the language of the translation. It can be formatted either with two chars or with 5. For example you could have `fr` or `fr_FR`
* `key` is a string representing the key used to refer to this translation
* `namespace` is a string representing the namespace of the translation. For example, you could have `/project/pricer/invoices`
* `content` is a string representing the content of your translation


## Contribution
As FEI Service, designed and made by OpCoding. The contribution workflow will involve both technical teams. Feel free to contribute, to improve features and apply patches, but keep in mind to carefully deal with pull request. Merging must be the product of complete discussions between Flash and OpCoding teams :) 
