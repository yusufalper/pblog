<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Register</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="#">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Surname:</label>
                <input type="text" name="surname" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>E-Mail:</label>
                <input type="email" name="email" placeholder="xxxxx@yyyy.com" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Phone:</label>
                <input type="tel" name="phone" placeholder="00-123-456-7890" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required/>
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
        </form>
    </div>
</div>