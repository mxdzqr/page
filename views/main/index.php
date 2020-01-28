<?php require_once(ROOT . '/views/layouts/header.php'); ?>
		
		<div class="content">

			<div class="left">
				<div class="post">
					<form method="post">
						<div class="post_title">
							<span>Введите заголовок</span>
							<input type="text" name="title">
						</div>
						<div class="post_description">
							<span>Введите краткое описание</span>
							<textarea name="description" cols="10" rows="7"></textarea>
						</div>

						<div class="post_text">
							<span>Введите текст записи</span>
							<textarea name="text" cols="10" rows="10"></textarea>
						</div>	
						<div class="btn">
							<input type="submit" value="Отправить" name="submit">
						</div>	
						<span>Мин.длина ввода 6 символов</span>		
					</form>
				</div>
				<div class="generate">
					<form action="#" method="post">	
						<h2>Рандом записи</h2>
						<div class="generate_post">
							<span>Кол-во записей</span>
							<input type="number" min="1" value="1" name="quantity_value">
						</div>	
						<div class="generate_post">
							<span>Длина заголовка:</span>
							<input type="number" min="5" value="5"	name="quantity_title">
						</div>
						<div class="generate_post">
							<span>Длина описания:</span>
							<input type="number" min="5" value="5" name="quantity_description">
						</div>
						<div class="generate_post">
							<span>Длина текста статьи:</span>
							<input type="number" min="5" value="5" name="quantity_text">
						</div>		
						<input type="submit" class="btn-random" name="generate">
					</form>
				</div>

				<div class="value_entry">
					<form action="#" method="post">
						<span>Сколько отображать записей?</span>				
						<select name="value_select">
							<option name="1" value="10" selected>10</option> 
							<option name="2" value="20">20</option> 
							<option name="3" value="50">50</option> 
							<option name="4" value="100">100</option>
							<option name="5" value="0">Все</option>
						</select>
						<button type="submit" name="btn_select">Submit</button>
					</form>					
				</div>
				
			</div>
			
			<div class="articles">

				<div class="grid">
					<?php foreach($entrys as $entry): ?>
                        <div class="entry">
                            <div class="entry_title">
                                <h1><?=$entry['title']?></h1>
                            </div>		

                            <div class="entry_description">
                                <span><?=$entry['description']?></span>
                            </div>

                            <div class="entry_text">
                                <p><?=$entry['text']?></p>
                                <a href="/entry/<?=$entry['id'];?>">Читать полностью.</a>
                            </div>

                            <div class="entry_date">
                                <time><?=$entry['date']?></time>
                            </div>
                        </div>		
                    <?php endforeach; ?>							
				</div>	
				
				<div class="pagination">
					<?php for($i = 1; $i <=$pagination['total']; $i++) {
							if($i == $pagination['current']) {
								echo "<a class='active' href='/page/".$i."'>".$i."</a>";
							} else {
								echo "<a href='/page/".$i."'>".$i."</a>";
							}
						}?>
				</div>

			</div>	
		</div>
    </div>	
<?php require_once(ROOT . '/views/layouts/footer.php'); ?>
