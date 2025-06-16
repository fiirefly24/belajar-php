# 🧠 Module X: Guard Clauses & Early Returns in PHP  
## Think Like a Pro: Writing Cleaner, Safer Conditionals  

### 🎯 Goal  
Understand how to use **guard clauses** and **early returns** to write:
- Cleaner code  
- Easier-to-read logic  
- Fewer nested conditions  
- More maintainable functions  

You’ll learn **when and why** to avoid `else` blocks, and how to structure your code using early exits for better readability and control flow.

---

## 🔍 What Are Guard Clauses?

A **guard clause** is a piece of code at the beginning of a function that checks for certain conditions and **returns early** if those conditions are not met.

This helps you:

✅ Reduce nesting  
✅ Improve readability  
✅ Make error cases obvious  
✅ Keep happy path logic clean and uncluttered  

---

## 🧱 Classic vs. Guard Clause Style

### ❌ Classic Nested Style

```php
function processOrder($order) {
    if ($order->isValid()) {
        if ($order->hasPayment()) {
            echo "Processing order...\n";
        } else {
            echo "No payment found.\n";
        }
    } else {
        echo "Invalid order.\n";
    }
}
```

> This works, but it's deeply nested, and harder to read as more conditions are added.

---

### ✅ Guard Clause Style (Early Returns)

```php
function processOrder($order) {
    if (!$order->isValid()) {
        echo "Invalid order.\n";
        return;
    }

    if (!$order->hasPayment()) {
        echo "No payment found.\n";
        return;
    }

    echo "Processing order...\n";
}
```

> This version is **flatter**, **cleaner**, and easier to **extend or debug**.

---

## 💡 Why Use Guard Clauses?

| Benefit                | Explanation |
|------------------------|-------------|
| ✅ Reduces Nesting     | No need for deeply indented code |
| ✅ Improves Readability | The main logic isn’t buried inside `if/else` |
| ✅ Makes Errors Stand Out | Invalid states are handled first |
| ✅ Encourages Single Responsibility | Functions become more focused on one task |

---

## 🛠 When to Use Guard Clauses

Use guard clauses when:

- You're doing **validation** (e.g., checking input, permissions)  
- You want to handle **error cases** up front  
- You're protecting critical operations from bad data  
- You want to simplify complex conditionals  

---

## 🚫 When Not to Use Guard Clauses

Avoid them when:

- The logic is simple and balanced (like login success/failure)  
- Using them would make code less clear (especially for beginners)  
- You’re working with UI rendering logic where both branches should run  

### Example where `else` makes sense:

```php
if ($isLoggedIn) {
    showDashboard();
} else {
    showLogin();
}
```

---

## 📚 Common Guard Clause Patterns

### 1. Validation Checks

```php
function divide($a, $b) {
    if ($b === 0) {
        echo "Cannot divide by zero.";
        return;
    }
    echo $a / $b;
}
```

---

### 2. Permission Checks

```php
function editPost($user, $post) {
    if ($user->id !== $post->author_id) {
        echo "You don't have permission to edit this post.";
        return;
    }
    // Allow editing
}
```

---

### 3. Input Sanitization

```php
function saveUser($data) {
    if (empty($data['email'])) {
        echo "Email is required.";
        return;
    }
    // Save user
}
```

---

### 4. State-Based Logic

```php
function sendInvoice($invoice) {
    if ($invoice->status !== 'approved') {
        echo "Only approved invoices can be sent.";
        return;
    }
    // Send email
}
```

---

## 🧩 Advanced Guard Clause Techniques

### 1. Throwing Exceptions Instead of Returning

In real apps, instead of echoing errors, we often throw exceptions:

```php
function divide($a, $b) {
    if ($b === 0) {
        throw new Exception("Cannot divide by zero.");
    }
    return $a / $b;
}
```

> This keeps functions pure and lets higher-level code decide how to handle errors.

---

### 2. Using Helper Functions

Extract complex checks into helper functions for reusability:

```php
function canEditPost($user, $post) {
    return $user->id === $post->author_id;
}

function editPost($user, $post) {
    if (!canEditPost($user, $post)) {
        echo "Permission denied.";
        return;
    }
    // Edit logic
}
```

---

### 3. Combining Multiple Guards

You can stack multiple guard clauses for clarity:

```php
function processRegistration($email, $password, $termsAccepted) {
    if (empty($email)) {
        echo "Email is required.";
        return;
    }
    if (empty($password)) {
        echo "Password is required.";
        return;
    }
    if (!$termsAccepted) {
        echo "You must accept the terms.";
        return;
    }
    // Proceed with registration
}
```