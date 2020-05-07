## Notification Service

Corporation X,Y,Z provide a notification service for sending SMS and E-mail notifications.

## Setup
### Clone
Copy&paste this command in your terminal

```git clonehttps://github.com/jnkindi/notifier.git```

```cd notifier```

### Run Migration
Copy&paste this command in your terminal

```php artisan migrate```

### Seed Database(Optional)
Copy&paste this command in your terminal

```php artisan db:seed```


## API Documentation
| Methods | Endpoints | Actions | Data |
| :----- | :----- | ----- | ----- |
| POST | /api/user | Creating new user | [name, month_quota] |
| GET | /api/user | Get all users |  |
| GET | /api/user/{id} | Get single user |  |
| PUT | /api/user/{id}/upgrade | Update Rate Limit/ Month Quota | [month_quota or rate_limit] |
| DELETE | /api/user/{id} | Delete User |  |
| GET | /api/user/{id}/notifications | Get Notifications |  |

## Running Multiple Notification Requests
Copy&paste this command in your terminal.

### Change:
* {id} to userID[Integer]
* 100 to number of request you would like to send
* {id} to your API URL

```for i in `seq 1 100`; do curl http://{API_URL}/api/user/{id}/notifications; done;```


## Builder

Solution made by [Jacques Nyilinkindi](http://jnkindilogs.xyz/).