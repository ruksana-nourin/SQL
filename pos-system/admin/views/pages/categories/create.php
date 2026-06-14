<div class="card">
    <div class="card-header">
        Add Category
    </div>

    <div class="card-body">
        <form action="" method="POST">

            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text"
                       name="category_name"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description"
                          class="form-control"
                          rows="3"></textarea>
            </div>

            <button type="submit"
                    class="btn btn-success">
                Save Category
            </button>

        </form>
    </div>
</div>