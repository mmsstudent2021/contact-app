
# Testing API With Auth

Contact App API for students from MMS IT


## API Reference

#### Login (Post)

```http
  https://contact-app.mms-it.com/api/v1/login
```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required** admin@gmail.com |
| `password` | `string` | **Required** admin123 |


#### Register (Post)

```http
  https://contact-app.mms-it.com/api/v1/register
```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required** example |
| `email` | `string` | **Required** example@gmail.com |
| `password` | `string` | **Required** asdffdsa |
| `password_confirmation` | `string` | **Required** asdffdsa |




### Get Contacts (Get)

```http
  https://contact-app.mms-it.com/api/v1/contact
```


### Get Single Contact (Get)

```http
  https://contact-app.mms-it.com/api/v1/contact/{id}
```

### Create Contact(POST)

```http
  https://contact-app.mms-it.com/api/v1/contact
```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required** Post Malone |
| `phone` | `integer` | **Required** 095146124 |
| `email` | `string` | **Nullable** post@gmail.com |
| `address` | `string` | **Nullable** NewYork |

### Update Contact(PUT)

```http
  https://contact-app.mms-it.com/api/v1/contact/{id}
```
  #### You can update with only singe Parameter or more
| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required** Post Malone |
| `phone` | `integer` | **Required** 095146124 |
| `email` | `string` | **Nullable** post@gmail.com |
| `address` | `string` | **Nullable** NewYork |

### Delete Contact (DELETE)

```http
  https://contact-app.mms-it.com/api/v1/contact/{id}
```






### Get Profile (GET)

```http
  https://contact-app.mms-it.com/api/v1/user-profile
```


### Get User devices (GET)

```http
  https://contact-app.mms-it.com/api/v1/user-devices
```

### Change Password (POST)

```http
   https://contact-app.mms-it.com/api/v1/change-password
```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `current_password` | `string` | **Required** admin123 |
| `password` | `string` | **Required** asdffdsa |
| `password_confirmation` | `string` | **Required** asdffdsa |

### Logout (POST)

```http
   https://contact-app.mms-it.com/api/v1/user-logout
```

# Points & Billing

## Billing


### Index(Get)
``
Get the List of bills
``
```http
   https://contact-app.mms-it.com/api/v1/billing
  ```

| Parameters | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `amount_type` | `integer` | **Required,1000,3000,5000** 3000 |
| `used` | `integer` | **Required** 0 |

### Generate(Post)
``
To generate more billing codes
``
```http
   https://contact-app.mms-it.com/api/v1/billing/generate
  ```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `amount_type` | `integer` | **Required,1000,3000,5000** 3000 |
| `count` | `integer` | **Required** **Min** 1  **Max** 30|

### TopUp(Post)
``
Topup points with bill codes
``
```http
   https://contact-app.mms-it.com/api/v1/billing/top-up
  ```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `code` | `integer` | **Required** 505314 |


## Transactions Point

### Transfer (Post)
``
Transfer points to user to user
``
```http
   https://contact-app.mms-it.com/api/v1/transaction/transfer
  ```

| Arguments | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `amount` | `integer` | **Required** 3000 |
| `email` | `integer` | **Required** admin@gmail.com|

### History (Get)
``
Get the history list of transaction
``
```http
   https://contact-app.mms-it.com/api/v1/transaction/history
  ```

| Parameters | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `type` | `string` | **Required** send Or receive |
