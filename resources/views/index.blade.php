<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdminPanel</title>
</head>
<body>
    <div class="sort">
        <div class="platform">
            <p>Platform</p>
            <input type="checkbox" id="ios" name="ios">
            <label for="ios">iOS</label>
            <input type="checkbox" id="android" name="android">
            <label for="android">Android</label>
            <input type="checkbox" id="amazone" name="amazone">
            <label for="amazone">Amazone</label>
        </div>
        <div class="version">
            <p>Version</p>
            <input type="radio" id="free" name="version">
            <label for="free">free</label>
            <input type="radio" id="premium" name="version">
            <label for="premium">premium</label>
        </div>
        <div class="published">
            <p>Published</p>
            <input type="radio" id="yes" name="published">
            <label for="yes">yes</label>
            <input type="checkbox" id="no" name="published">
            <label for="no">no</label>
        </div>
        <div class="sort_date">
            <p>Sort by date</p>
            <input type="radio" id="asc" name="sort_date">
            <label for="ASC">nearest date</label>
            <input type="radio" id="desc" name="sort_date">
            <label for="DESC">distant date</label>
        </div>

    </div>
    <div class="games">
        <div class="game">
            <p class="game_tech_title">
                Example.Tech.Title
            </p>
            <p class="create_date">
                11.11.2222
            </p>
            <img src="https://via.placeholder.com/150" alt="tech_name_img" class="image">
            <ul class="game_params">
                <li>big slider</li>
                <li>published</li>
                <li>free</li>
                <li>android</li>
            </ul>
            <a href="#" class="game_edit">edit</a>
        </div>
    </div>
</body>
</html>
