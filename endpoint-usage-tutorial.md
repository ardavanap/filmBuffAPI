# Project: filmBuffAPI
An IMDB-like api to manage movies submitted by admins, comment, rate and add to your favorites as a user.
# 📁 Collection: User 
Auhtenication using Laravel sanctum and bearer-token-based auth. 


## End-point: Register
Register as user using name and email and password. response contains your generated token.
### Method: POST
>```
>http://127.0.0.1:8000/api/auth/register
>```
### Body (**raw**)

```json
{
    "name" : "mohammad",
    "email" : "mohdammad@example.com",
    "password" : "123456789"
}
```

### Query Params

|Param|value|
|---|---|
|name|ardi|
|email|ardi@gmail.com|
|password|123456|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "user": {
        "name": "mohammad",
        "email": "mohdammad@example.com",
        "updated_at": "2025-10-21T23:08:59.000000Z",
        "created_at": "2025-10-21T23:08:59.000000Z",
        "id": 2
    },
    "token": "2|agZWJTMwbaRrPDwwDm7hVAp2GYm35a73VxGWlZ8wc1303635"
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Login
Login using email and password. you can do it multiple times to generate multiple tokens.

using this credintials, you can login as admin.

StartFragment

``` json
"email" : "matin12@example.com",
    "password" : "123456"

 ```

EndFragment
### Method: POST
>```
>http://127.0.0.1:8000/api/auth/login
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Body (**raw**)

```json
{
    "email" : "matin12@example.com",
    "password" : "123456"
}
```

### 🔑 Authentication noauth

|Param|value|Type|
|---|---|---|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "user": {
        "id": 2,
        "name": "mohammad",
        "email": "mohdammad@example.com",
        "email_verified_at": null,
        "is_admin": 0,
        "created_at": "2025-10-21T23:08:59.000000Z",
        "updated_at": "2025-10-21T23:08:59.000000Z"
    },
    "token": "3|3xW3kfkYA2Mz4UcsUinHh3DGZf5YuMNt4RZo693O21433bee"
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Logout
Simply logout. Every token of user will be deleted.
### Method: POST
>```
>http://127.0.0.1:8000/api/auth/logout
>```
### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|4|plU9lIaaYOx3xwm8DeIzfu8VNFUzaQRJQ6S3KhwX58d1d523|string|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
# 📁 Collection: Movie 
fetch all, add, update and delete movies (Admins only, except fetching all movies or showing a movie.)

using this credentials, you can login as admin

StartFragment

``` json
"email" : "matin12@example.com",
"password" : "123456"

 ```

EndFragment 


## End-point: Index
Fetch all movies. pagination used and has manny pages. each page contains 10 movies.
### Method: GET
>```
>http://127.0.0.1:8000/api/movie/
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|1|6BmFOgbHYpK3lW5XhzHLTZXM526M4ogz2HnE1S1w63f9e041|string|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "movies": [
        {
            "id": 1,
            "category_id": 1,
            "title": "test",
            "description": "fasd fsadf asdf asdf",
            "release_year": 2001,
            "duration": 124,
            "poster": "fhdfg dfgh dfg",
            "trailer_url": "fhgdfg hfgh "
        },
        {
            "id": 2,
            "category_id": 2,
            "title": "hwey",
            "description": "ghdf asdf yj",
            "release_year": 2005,
            "duration": 130,
            "poster": "cvxb cxvbn dfg",
            "trailer_url": "hfdg nvfh esf"
        },
        {
            "id": 4,
            "category_id": 5,
            "title": "postiiii",
            "description": "a really good appasd",
            "release_year": 2009,
            "duration": 110,
            "poster": null,
            "trailer_url": "https://sadfsfadfd.fadfss"
        }
    ]
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Index?page=2
This way you can access second or further pages of paginated list of movies.
### Method: GET
>```
>http://127.0.0.1:8000/api/movie?page=2
>```
### Query Params

|Param|value|
|---|---|
|page|2|


### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|1|6BmFOgbHYpK3lW5XhzHLTZXM526M4ogz2HnE1S1w63f9e041|string|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Index?search=green
Fetch movies that contain the search term in their title or description.
### Method: GET
>```
>http://127.0.0.1:8000/api/movie?search=green
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Query Params

|Param|value|
|---|---|
|search|green|


### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|1|6BmFOgbHYpK3lW5XhzHLTZXM526M4ogz2HnE1S1w63f9e041|string|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Index?category=action
fetch movies with a specific category.
### Method: GET
>```
>http://127.0.0.1:8000/api/movie?category=action
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Query Params

|Param|value|
|---|---|
|category|action|


### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|1|6BmFOgbHYpK3lW5XhzHLTZXM526M4ogz2HnE1S1w63f9e041|string|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Index?year=2005
Fetch movies by their release year.
### Method: GET
>```
>http://127.0.0.1:8000/api/movie?year=2005
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Query Params

|Param|value|
|---|---|
|year|2005|


### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|1|6BmFOgbHYpK3lW5XhzHLTZXM526M4ogz2HnE1S1w63f9e041|string|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Index search & category & year
Combine queries for more specific needs.
### Method: GET
>```
>http://127.0.0.1:8000/api/movie?year=2005&search=Torphy&category=action
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Query Params

|Param|value|
|---|---|
|year|2005|
|search|Torphy|
|category|action|


### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|1|6BmFOgbHYpK3lW5XhzHLTZXM526M4ogz2HnE1S1w63f9e041|string|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Store
Store a movie (admin Only).
### Method: POST
>```
>http://127.0.0.1:8000/api/movie
>```
### Headers

|Content-Type|Value|
|---|---|
|Accpet|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Content-Type|multipart/form-data|


### Headers

|Content-Type|Value|
|---|---|
|Content-Type|application/json|


### Body formdata

|Param|value|Type|
|---|---|---|
|data|{"title" : "La vita e bella", "description" : "Full of comedy and life, but not for long.", "release_year" :  1998, "duration" : "125", "trailer_url" : "https://lifeisbeautiful.not" , "category_id" : 2}|text|
|title|La vita e bella|text|
|description|a great action MOvie|text|
|release_year|1990|text|
|duration|111|text|
|trailer_url|https://johnwick.com|text|
|category_id|1|text|
|poster|/C:/Users/ardav/OneDrive/Desktop/images.jpg|file|


### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|5|ByGxPL4LxmOi1HsauW0YBeXKGHPNXWHXRrrKuC0b4ad7a96f|string|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "movie": {
        "title": "postiiii",
        "description": "a really good appasd",
        "release_year": "2009",
        "duration": "110",
        "trailer_url": "https://sadfsfadfd.fadfss",
        "category_id": "5",
        "id": 4
    }
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Get poster image
Retrive poster of a movie. The path to poster can be retrieved by fetching the movie first.
### Method: GET
>```
>http://127.0.0.1:8000/storage/posters/xuQ2YktRROG6fVH5LsRYRNEfbnvIVuexEL0vv8w1.jpg
>```
### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|6|K7iFyD2SdSvWnjMJIIpgwvUnb2pDpOnjOkdF96gv373c1adb|string|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Show
Fetch a movie by its id
### Method: GET
>```
>http://127.0.0.1:8000/api/movie/4
>```
### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|1|uMCjfAC5XUcORyusXXxepnDzPkTTeEPB5VqSIBqv6f80285d|string|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "movie": null
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Delete
Remove a movie (admin only).
### Method: DELETE
>```
>http://127.0.0.1:8000/api/movie/1
>```
### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|1|iWNUqCMGwKTp7FokfSvoHKLws6FWu2OWNRM4olira8a684ef|string|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "message": "Movie deleted"
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Update
Update any field of a movie (admin only).

Provide desierd movie ID in url.
### Method: PATCH
>```
>http://127.0.0.1:8000/api/movie/4/
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Body (**raw**)

```json
{
    "title" : "the mega mind",
    "release_year" : 2010
}
```

### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|5|ByGxPL4LxmOi1HsauW0YBeXKGHPNXWHXRrrKuC0b4ad7a96f|string|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "message": "Movie updated successfully",
    "data": {
        "id": 4,
        "title": "the mega mind",
        "description": "Vero fugit non non reprehenderit iure commodi est. Beatae et enim et eligendi dolor odio repudiandae. Aliquid fugit aspernatur id id. Ullam repellat numquam nulla voluptatum id.",
        "release_year": 2010,
        "duration": 2015,
        "poster": "https://via.placeholder.com/640x480.png/004400?text=molestiae",
        "trailer_url": "http://upton.com/ut-totam-nam-molestiae-molestiae-quaerat-autem",
        "category_id": 18
    }
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
# 📁 Collection: Comment 
undefined 


## End-point: Show
Show comments of a movie.  
Provide movie ID in url first.
### Method: GET
>```
>http://127.0.0.1:8000/api/movie/9/comment
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|1|6BmFOgbHYpK3lW5XhzHLTZXM526M4ogz2HnE1S1w63f9e041|string|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
[
    {
        "content": "Optio rerum fugit qui. Quae iste fuga veritatis molestiae in libero. Dolor necessitatibus porro enim consequatur eaque. Beatae nam iusto quia labore suscipit eaque expedita."
    },
    {
        "content": "Commodi nulla id et alias. At molestiae rerum dolores culpa consequatur hic. Ratione nihil et rem. Atque culpa recusandae voluptatem voluptates nostrum."
    }
]
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Store
Add a comment on a movie.

Provide movie ID in url first.
### Method: POST
>```
>http://127.0.0.1:8000/api/movie/4/comment
>```
### Body (**raw**)

```json
{
    "content" : "my second comment"
}
```

### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|1|xw4WlnUmjlHoqgP9KdcXm9TjmZgMqLSqxnyQ3onSb07377de|string|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
# 📁 Collection: Rating 
fetch Ratings of a movie and rate a movie. 


## End-point: Show rating
Fetch rating of a movie.

Provide movie ID in url first.
### Method: GET
>```
>http://127.0.0.1:8000/api/movie/10/rating
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|1|uMCjfAC5XUcORyusXXxepnDzPkTTeEPB5VqSIBqv6f80285d|string|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
3.5
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Store rate
Rate a movie.

Provide movie ID in url first.
### Method: POST
>```
>http://127.0.0.1:8000/api/movie/10/rate
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Body (**raw**)

```json
{
    "score" : 8
}
```

### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|1|uMCjfAC5XUcORyusXXxepnDzPkTTeEPB5VqSIBqv6f80285d|string|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
# 📁 Collection: Favorite 
add or remove a movie to/from your favorite movies list. 


## End-point: Show User Faves
Fetch your favorite movies.
### Method: GET
>```
>http://127.0.0.1:8000/api/user/favorites
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|1|Ue63GeDuGmCKkyLPc2j9TAPIbH1bjDXKSJhFiAaD08801316|string|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Store favorite movie
Add or remove a movie as favorite.

Provide movie ID in url first.
### Method: POST
>```
>http://127.0.0.1:8000/api/movie/20/favorite
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Body (**raw**)

```json

```

### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|1|Ue63GeDuGmCKkyLPc2j9TAPIbH1bjDXKSJhFiAaD08801316|string|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
_________________________________________________
Powered By: [postman-to-markdown](https://github.com/bautistaj/postman-to-markdown/)
