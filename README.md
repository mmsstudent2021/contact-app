
# Project Title

Contact api from MMS-IT


## API Reference

#### Login

```http
  Post https://contact-app.mms-it.com/api/v1/login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required** admin@gmail.com |
| `password` | `string` | **Required** admin123 |


#### Register

```http
  Post https://contact-app.mms-it.com/api/v1/register
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required** example |
| `email` | `string` | **Required** example@gmail.com |
| `password` | `string` | **Required** asdffdsa |
| `password_confirmation` | `string` | **Required** asdffdsa |




### Get Contacts

```http
  Get https://contact-app.mms-it.com/api/v1/contact
```


### Get Single Contact

```http
  GEt https://contact-app.mms-it.com/api/v1/contact/{id}
```

### Create Contact

```http
  POST https://contact-app.mms-it.com/api/v1/contact
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required** Post Malone |
| `phone` | `integer` | **Required** 095146124 |
| `email` | `string` | **Nullable** post@gmail.com |
| `address` | `string` | **Nullable** NewYork |

### Update Contact

```http
  Put https://contact-app.mms-it.com/api/v1/contact/{id}
```
  #### You can update with only singe Parameter or more
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required** Post Malone |
| `phone` | `integer` | **Required** 095146124 |
| `email` | `string` | **Nullable** post@gmail.com |
| `address` | `string` | **Nullable** NewYork |

### Delete Contact

```http
  Delete https://contact-app.mms-it.com/api/v1/contact/{id}
```






### Get Profile

```http
  Get https://contact-app.mms-it.com/api/v1/user-profile
```


### Get User devices

```http
  GEt https://contact-app.mms-it.com/api/v1/user-devices
```

### Change Password

```http
  POST https://contact-app.mms-it.com/api/v1/change-password
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `current_password` | `string` | **Required** admin123 |
| `password` | `string` | **Required** asdffdsa |
| `password_confirmation` | `string` | **Required** asdffdsa |

### Change Password

```http
  POST https://contact-app.mms-it.com/api/v1/user-logout
```
