# NIDO API

Authorization: Basic YWRtaW46S2FyZW5NYWdhbmRh

### Table of contents
+ [Login](#sign-in)
+ [Registration](#registration)

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
|  number_of_children[]      |  yes     |      |  int | 1
|  current_brand_milk[]      |  yes     |      |  varchar | Bonakid
|  signature[]      |  yes     |  text |      | karen_cute.jpeg
|  registration_etimestamp[]      |  yes     |  datetime |      | 2024-01-20 20:43:02 - etimestamp of registration
|  child_age[0][]      |  yes     |  int | child_age[_child_age_array_key_][] | SAMPLE: child_age[0][1], child_age[1][2]

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