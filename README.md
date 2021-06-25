# VatfallbackGraphQL

**VatfallbackGraphQL** adds a GraphQl endpoint to the Dutchento Vatfallback module for Magento 2.

In the Dutchento Vatfallback module it is possible to use the API endpoint to get company data by VAT number
`http://domain.com/rest/V1/vat/companylookup/NL133001477B01`

With this module this can be done by GraphQl:
```graphql
query {
  CompanyLookup(
    vatNumber: "NL133001477B01"
  ) {
    status, 
    country,
    company_name,
    company_address,
    message
  }
}
```

