<?php require_once(ROOT . '/views/layouts/header.php');?>
<body>
	<div class="wrapper">
       <div class="send">
            <form action="#" method="post" id="mailForm">
                <h1>Обратная связь</h1>
                    <input type="email" name="email" id="email" placeholder="Email" required >
                    <input type="text" name="name" id="name" placeholder="Имя" required  >          
                    <input type="phone" name="phone" id="phone" placeholder="Телефон" required  >             
                    <textarea name="message" cols="50" rows="15" id="message" placeholder="Текс сообщения" required ></textarea>
                <button type="submit" name="btn-send" id="sendMail">Отправить</button>
            </form>
            <div id="errorMessage"></div>
       </div>
	</div>
<?php require_once(ROOT . '/views/layouts/footer.php'); ?>
