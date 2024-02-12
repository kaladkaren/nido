# NIDO API

Authorization: Basic YWRtaW46S2FyZW5NYWdhbmRh

### Table of contents
+ [Login](#sign-in)
+ [Registration](#registration)
+ [Provinces](#provinces)
+ [Cities](#cities)
+ [Barangay](#barangay)

### Sign-in
**POST:** _api/registration_api/sign_in_

|      Name      | Required |   Type    |    Description        |    Sample Data 
|----------------|----------|-----------|-----------------------|-----------------------
| email       |  yes     |  varchar |      |  ambassador1@gmail.com
| password       |  yes     |  varchar |      |  secret


<strong>Response</strong>
```javascript
200 Ok
{
  "data": {
    "id": "1",
    "email": "admin@gmail.com",
    "fname": "Karen Joy",
    "mname": "",
    "lname": "Morales",
    "role": "1",
    "active": "1",
    "created_at": "2024-01-21 21:13:16"
  },
  "meta": {
    "message": "Successfully login.",
    "code": "ok",
    "status": 200
  }
}
```

```javascript
409 Conflict
{
    "data": {},
    "meta": {
        "message": "Invalid credentials",
        "code": "invalid_credentials",
        "status": 409
    }
}
```

### Registration
**POST:** _api/user/{user_id}/batch-registration_

|      Name      | Required |   Type    |    Description        |    Sample Data 
|----------------|----------|-----------|-----------------------|-----------------------
|  fname[]      |  yes     |  varchar |      |  Karen
|  lname[]      |  yes     |  varchar |      |  Morales
|  contact_num[]      |  yes     |  varchar |      | 09089098767
|  email[]      |  yes     |  varchar |      | admin@gmail.com
|  birthday[]      |  yes     |  date |      | 1998-11-10
|  relationship[]      |  yes     |  int |      | 1- parent, 2 - guardian
|  number_of_children[]      |  yes     | int     |   | 1
|  child_age[]      |  yes     | varchar     | Comma separted number value  | 3,4,5
|  current_brand_milk[]      |  yes     | varchar     |   | Bonakid
|  signature[]      |  yes     |  text |      | karen_cute.jpeg
|  registration_etimestamp[]      |  yes     |  datetime |      | 2024-01-20 20:43:02 - etimestamp of registration
|  province_id[]       |  yes     |  int | will get from + [Provinces](#provinces) responce      |  21
|  city_id[]       |  yes     |  int | will get from + [Cities](#cities) responce      |  489
|  brgy_id[]       |  yes     |  int | will get from + [Barangay](#barangay) responce      |  12677

<strong>Response</strong>
```javascript
200 Ok
{
    "meta": {
        "message": "Registered successfully.",
        "code": "ok",
        "status": 201
    }
}
```

### Provinces
**GET:** _api/registration_api/provinces_


<strong>Response</strong>
```javascript
{
    "data": [
        {
            "id": "4",
            "psgcCode": "015500000",
            "provDesc": "PANGASINAN",
            "regCode": "01",
            "provCode": "0155",
            "active": "1"
        },
        {
            "id": "11",
            "psgcCode": "031400000",
            "provDesc": "BULACAN",
            "regCode": "03",
            "provCode": "0314",
            "active": "1"
        },
        {
            "id": "21",
            "psgcCode": "045800000",
            "provDesc": "RIZAL",
            "regCode": "04",
            "provCode": "0458",
            "active": "1"
        }
    ],
    "meta": {
        "message": "Successfully fetch.",
        "code": "ok",
        "status": 200
    }
}
```

### Cities
**GET:** _api/registration_api/cities/{provCode}_

|      Name      | Required |   Type    |    Description        |    Sample Data 
|----------------|----------|-----------|-----------------------|-----------------------
| provCode       |  yes     |  varchar | will get from + [Provinces](#provinces) responce      |  0458


<strong>Response</strong>
```javascript
{
    "data": [
        {
            "id": "477",
            "psgcCode": "045801000",
            "citymunDesc": "ANGONO",
            "regDesc": "04",
            "provCode": "0458",
            "citymunCode": "045801"
        },
        {
            "id": "478",
            "psgcCode": "045802000",
            "citymunDesc": "CITY OF ANTIPOLO",
            "regDesc": "04",
            "provCode": "0458",
            "citymunCode": "045802"
        },
        {
            "id": "479",
            "psgcCode": "045803000",
            "citymunDesc": "BARAS",
            "regDesc": "04",
            "provCode": "0458",
            "citymunCode": "045803"
        },
        {
            "id": "480",
            "psgcCode": "045804000",
            "citymunDesc": "BINANGONAN",
            "regDesc": "04",
            "provCode": "0458",
            "citymunCode": "045804"
        },
        {
            "id": "481",
            "psgcCode": "045805000",
            "citymunDesc": "CAINTA",
            "regDesc": "04",
            "provCode": "0458",
            "citymunCode": "045805"
        },
        {
            "id": "482",
            "psgcCode": "045806000",
            "citymunDesc": "CARDONA",
            "regDesc": "04",
            "provCode": "0458",
            "citymunCode": "045806"
        },
        {
            "id": "483",
            "psgcCode": "045807000",
            "citymunDesc": "JALA-JALA",
            "regDesc": "04",
            "provCode": "0458",
            "citymunCode": "045807"
        },
        {
            "id": "484",
            "psgcCode": "045808000",
            "citymunDesc": "RODRIGUEZ (MONTALBAN)",
            "regDesc": "04",
            "provCode": "0458",
            "citymunCode": "045808"
        },
        {
            "id": "485",
            "psgcCode": "045809000",
            "citymunDesc": "MORONG",
            "regDesc": "04",
            "provCode": "0458",
            "citymunCode": "045809"
        },
        {
            "id": "486",
            "psgcCode": "045810000",
            "citymunDesc": "PILILLA",
            "regDesc": "04",
            "provCode": "0458",
            "citymunCode": "045810"
        },
        {
            "id": "487",
            "psgcCode": "045811000",
            "citymunDesc": "SAN MATEO",
            "regDesc": "04",
            "provCode": "0458",
            "citymunCode": "045811"
        },
        {
            "id": "488",
            "psgcCode": "045812000",
            "citymunDesc": "TANAY",
            "regDesc": "04",
            "provCode": "0458",
            "citymunCode": "045812"
        },
        {
            "id": "489",
            "psgcCode": "045813000",
            "citymunDesc": "TAYTAY",
            "regDesc": "04",
            "provCode": "0458",
            "citymunCode": "045813"
        },
        {
            "id": "490",
            "psgcCode": "045814000",
            "citymunDesc": "TERESA",
            "regDesc": "04",
            "provCode": "0458",
            "citymunCode": "045814"
        }
    ],
    "meta": {
        "message": "Successfully fetch.",
        "code": "ok",
        "status": 200
    }
}
```

### Barangay
**GET:** _api/registration_api/barangay/{citymunCode}_

|      Name      | Required |   Type    |    Description        |    Sample Data 
|----------------|----------|-----------|-----------------------|-----------------------
| citymunCode       |  yes     |  varchar | will get from + [Cities](#cities) responce      |  045813


<strong>Response</strong>
```javascript
{
    "data": [
        {
            "id": "12676",
            "brgyCode": "045813001",
            "brgyDesc": "Dolores (Pob.)",
            "regCode": "04",
            "provCode": "0458",
            "citymunCode": "045813"
        },
        {
            "id": "12677",
            "brgyCode": "045813002",
            "brgyDesc": "Muzon",
            "regCode": "04",
            "provCode": "0458",
            "citymunCode": "045813"
        },
        {
            "id": "12678",
            "brgyCode": "045813003",
            "brgyDesc": "San Isidro",
            "regCode": "04",
            "provCode": "0458",
            "citymunCode": "045813"
        },
        {
            "id": "12679",
            "brgyCode": "045813004",
            "brgyDesc": "San Juan",
            "regCode": "04",
            "provCode": "0458",
            "citymunCode": "045813"
        },
        {
            "id": "12680",
            "brgyCode": "045813005",
            "brgyDesc": "Santa Ana",
            "regCode": "04",
            "provCode": "0458",
            "citymunCode": "045813"
        }
    ],
    "meta": {
        "message": "Successfully fetch.",
        "code": "ok",
        "status": 200
    }
}
```