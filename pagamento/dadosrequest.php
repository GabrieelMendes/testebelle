
    curl --request POST \
    --url https://sandbox.api.pagseguro.com/orders \
    --header 'Authorization: Bearer <token>' \
    --header 'accept: application/json' \
    --header 'content-type: application/json' \
    --data '
{
 "reference_id": "ex-00001",
 "customer": {
   "name": "Jose da Silva",
   "email": "email@test.com",
   "tax_id": "12345678909",
   "phones": [
     {
       "country": "55",
       "area": "11",
       "number": "999999999",
       "type": "MOBILE"
     }
   ]
 },
 "items": [
   {
     "reference_id": "referencia do item",
     "name": "nome do item",
     "quantity": 1,
     "unit_amount": 500
   }
 ],
 "shipping": {
   "address": {
     "street": "Avenida Brigadeiro Faria Lima",
     "number": "1384",
     "complement": "apto 12",
     "locality": "Pinheiros",
     "city": "São Paulo",
     "region_code": "SP",
     "country": "BRA",
     "postal_code": "01452002"
   }
 },
 "notification_urls": [
   "https://meusite.com/notificacoes"
 ]
}
'















Exemplo de Resposta (Response):
json
Copy code
{
  "id": "ORDE_F87334AC-BB8B-42E2-AA85-8579F70AA328",
  "reference_id": "ex-00001",
  "created_at": "2020-11-21T23:23:22.69-03:00",
  "shipping": {
    "address": {
      "street": "Avenida Brigadeiro Faria Lima",
      "number": "1384",
      "complement": "apto 12",
      "locality": "Pinheiros",
      "city": "São Paulo",
      "region_code": "SP",
      "country": "BRA",
      "postal_code": "01452002"
    }
  },
  "items": [
    {
      "reference_id": "referencia do item",
      "name": "nome do item",
      "quantity": 1,
      "unit_amount": 500
    }
  ],
  "customer": {
    "name": "Jose da Silva",
    "email": "email@test.com",
    "tax_id": "12345678909",
    "phones": [
      {
        "country": "55",
        "area": "11",
        "number": "999999999",
        "type": "MOBILE"
      }
    ]
  },
  "charges": [],
  "qr_codes": [],
  "links": []
}

