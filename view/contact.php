<?php
//var_dump($errors);

?>

<form action="/contact" method="post">
    <div class="col-md-5" style="text-align:left;">
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control <?php echo $errors['email']!=false ? 'is-invalid' : '' ?>"
                   placeholder="Enter email"  name="email">
            <div class="invalid-feedback">
                <?php echo $errors['email'] ?>
            </div>
        </div>

        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>