<?php include __DIR__ .'/../partials/header.view.php'?>
    <div class="container">
        <main class="content">
            <div class="movie-image">
                <div class="movie-media">
                    <img src="<?= htmlspecialchars($imageUrl['secure_base_url']) . 'w300' . htmlspecialchars($movie['poster_path']) ?>" 
                    alt="<?= htmlspecialchars($movie['title']) ?>">
                    
                    <!-- <iframe src="<?= htmlspecialchars($movieVideo['id']) ?>" frameborder="0"></iframe> -->
                </div>
                
                <div class="movie-info">
                    <p><?= htmlspecialchars($movie['title']) ?></p>
                    <p><?= htmlspecialchars($movie['overview']) ?></p>
                    <p><?= htmlspecialchars($movie['release_date']) ?></p>
                    <p><?= htmlspecialchars($movie['vote_average']) ?></p>
                    <p><?= htmlspecialchars($movie['original_language']) ?></p>
                </div>

            </div>
        </main>
    </div>
<?php include __DIR__ .'/../partials/footer.view.php'?>