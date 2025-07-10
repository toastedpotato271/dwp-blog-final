<a href="{{ route('roles.index') }}" class="btn-secondary">← Back to Roles</a>

<div class="create-role-container">
    <h2 class="heading">Create a New Role</h2>
    <p class="subtitle">Define a new role and describe its responsibility.</p>

    <form action="{{ route('roles.store') }}" method="POST" class="create-role-form">
        @csrf

        <div class="form-group">
            <label for="role_name">Role Name</label>
            <input type="text" id="role_name" name="role_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary">➕ Create Role</button>
        </div>
    </form>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

body {
    font-family: 'Inter', sans-serif;
    background-color: #f3f4f6;
    margin: 0;
    padding: 0;
}

.create-role-container {
    max-width: 500px;
    margin: 50px auto;
    padding: 32px;
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
}

.heading {
    font-size: 24px;
    font-weight: 600;
    color: #111827;
    margin-bottom: 8px;
}

.subtitle {
    font-size: 14px;
    color: #6b7280;
    margin-bottom: 24px;
}

.create-role-form {
    width: 100%;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #374151;
}

.form-control {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 15px;
    background-color: #f9fafb;
    color: #111827;
    transition: border 0.3s ease;
}

.form-control:focus {
    border-color: #6366f1;
    outline: none;
    background: #fff;
}

textarea.form-control {
    resize: vertical;
}

.btn-primary {
    background-color: #4f46e5;
    color: white;
    padding: 10px 18px;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
    font-size: 14px;
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
}

.btn-primary:hover {
    background-color: #4338ca;
    transform: scale(1.02);
}

.btn-secondary {
    background-color: #9ca3af;
    color: white;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    display: inline-block;
    margin: 30px auto 10px 50px;
    transition: all 0.2s ease-in-out;
}

.btn-secondary:hover {
    background-color: #6b7280;
}
</style>
