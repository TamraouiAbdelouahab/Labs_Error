# **Error 419: Page Expired (Missing @csrf Token)**

---

## **Cause:**
The **419 Page Expired** error happens when the CSRF token is missing or invalid in a form submission.

---

## **Quick Fix:**

1. **Add @csrf in the Form:**

    ```html
    <form action="{{ route('submit') }}" method="POST">
        @csrf
        <input type="text" name="name">
        <button type="submit">Submit</button>
    </form>
    ```

2. **Check CSRF Middleware:**
   If excluding routes from CSRF, add them in `app/Http/Middleware/VerifyCsrfToken.php`:
   
    ```php
    protected $except = [
        'route/exclude',
    ];
    ```

3. **For AJAX Requests:**
   Include CSRF token in your JavaScript:

    ```javascript
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    ```

   Add this meta tag in your `<head>`:
   
    ```html
    <meta name="csrf-token" content="{{ csrf_token() }}">
    ```

4. **Clear Laravel Cache:**
   Run the following commands:

    ```sh
    php artisan cache:clear
    php artisan config:clear
    php artisan route:clear
    php artisan view:clear
    ```

5. **Test in Incognito Mode:**
   Try a different browser or incognito mode to bypass cache/session issues.

---

## **Conclusion:**
The 419 error typically occurs due to a missing CSRF token. Add the token to the form and verify session/cache settings to resolve the issue.

---

Need a printable version? Contact us!
