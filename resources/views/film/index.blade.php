<?php include __DIR__ .'/../partials/header.view.php'?>
    <div class="container">
        <main class="movie-index-content">

            <select class="genre-filter form-control col-2">
                <?php foreach ($genres as $genre): ?>
                    <option class="option" value="<?= $_GET['genre'] ?? htmlentities($genre['id']) ?>">
                        <?= htmlentities($genre['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <div class="movie-table">
                <table class="table table-bordered">
                
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Rating</th>
                            <th>Your Rating</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($movies as $movie): ?>
                        <tr>
                            <td class="movie-table-image">
                                <a href="/movie/<?= htmlentities($movie['id']) ?>">
                                    <img src="<?= htmlentities($imageUrl['secure_base_url']) . 'w45' . htmlentities($movie['poster_path']) ?>" 
                                    alt="<?= htmlentities($movie['title']) ?>">
                                </a>
                            </td>
                            <td class="movie-table-title">
                                <a href="/movie/<?= htmlentities($movie['id']) ?>">
                                    <p><?= htmlentities($movie['title']) ?></p>
                                </a>    
                            </td>
                            <td class="movie-table-rating">
                                <i class="fas fa-star"></i>
                                <?= htmlentities($movie['vote_average']) ?>
                            </td>
                            <td class="movie-table-user-rating">
                                <?php if ($movie['vote_average' ] ===  null ): ?>
                                    <i class="fas fa-star"></i>
                                    <?= htmlentities($movie['vote_average']) ?>
                                <?php else: ?>
                                    <p>--</p>
                                <?php endif; ?>    
                            </td>
                        </tr>    
                    <?php endforeach; ?>	
                    </tbody>        
                
                </table>
            </div>
        </main>
    </div>
<?php include __DIR__ .'/../partials/footer.view.php'?>