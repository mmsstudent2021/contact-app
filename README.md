
# Testing API With Auth

Contact App API for students from MMS IT


## API Reference

#### Login (Post)

```http
  https://contact-app.mms-it.com/api/v1/login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required** admin@gmail.com |
| `password` | `string` | **Required** admin123 |


#### Register (Post)

```http
  https://contact-app.mms-it.com/api/v1/register
```

| Parameter | Type     | Description                |
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

| Parameter | Type     | Description                |
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
| Parameter | Type     | Description                |
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

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `current_password` | `string` | **Required** admin123 |
| `password` | `string` | **Required** asdffdsa |
| `password_confirmation` | `string` | **Required** asdffdsa |

### Logout (POST)

```http
   https://contact-app.mms-it.com/api/v1/user-logout
```

## Points & Billing

### 
