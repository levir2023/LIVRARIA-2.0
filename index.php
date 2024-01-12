<?php

 $pageInfo = array(
  'pageName' => 'index',
  'title' => 'Livraria Obras da Vida - Inspire-se na Culinária em Comunidade',
  'description' => 'Bem-vindo ao Livraria Obras da Vida, o seu destino online para explorar, criar e compartilhar experiências culinárias únicas. Descubra receitas deliciosas, compartilhe suas próprias criações e conecte-se com uma comunidade apaixonada por culinária. Seja você um chef experiente ou alguém apenas começando sua jornada na cozinha, aqui você encontrará inspiração para cada paladar.'
);

$pageName = $pageInfo['pageName'];

include_once(__DIR__ . '/components/public/header.php');

// Query para obter as receitas mais recentes
$query = "SELECT * FROM posts ORDER BY created_at";

// Executa a consulta
$result = mysqli_query($connection, $query);

// Passa as receitas para a variável $recipes
$recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Fecha a consulta
mysqli_free_result($result);
?>
<main class="">
  <section id="carrousel">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="src/img/banner1.webp" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="src/img/banner2.webp" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="src/img/banner3.webp" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="src/img/banner4.webp" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="src/img/banner5.webp" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
  </section>
  <section id="about" class="container py-5">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
        <img src="src/img/logo.png" alt="">
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <h1>
          Livraria Obras da Vida
        </h1>
        <p>
          Bem-vindo ao Livraria Obras da Vida, o seu destino online para explorar, criar e compartilhar experiências culinárias
          únicas. Descubra receitas deliciosas, compartilhe suas próprias criações e conecte-se com uma comunidade
          apaixonada por culinária. Seja você um chef experiente ou alguém apenas começando sua jornada na cozinha, aqui
          você encontrará inspiração para cada paladar.
        </p>
      </div>
    </div>
  </section>
  <section id="features" class=" features py-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-lg-3 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h4 class="card-icon">
                <i class="fas fa-utensils"></i>
              </h4>
              <h5 class="card-title">Descubra Um Novo Livro</h5>
              <p class="card-text">Navegue por uma ampla variedade de receitas, desde pratos clássicos até criações
                inovadoras. Encontre a inspiração certa para a sua próxima refeição.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-3 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h4 class="card-icon">
              <i class="fa-solid fa-address-book"></i>
              </h4>
              <h5 class="card-title">Compartilhe suas Histórias Favoritas</h5>
              <p class="card-text">Torne-se um chef em destaque compartilhando suas próprias receitas exclusivas. Faça
                parte da comunidade Livraria Obras da Vida e inspire outros amantes da culinária.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-3 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h4 class="card-icon">
                <i class="fas fa-comments"></i>
              </h4>
              <h5 class="card-title">Interação Comunitária</h5>
              <p class="card-text">Comente, curta e compartilhe suas impressões sobre as receitas de outros chefs.
                Explore
                fóruns e grupos temáticos para dicas e truques culinários.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-3 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h4 class="card-icon">
                <i class="fas fa-user-plus"></i>
              </h4>
              <h5 class="card-title">Junte-se a Nós</h5>
              <p class="card-text">Registre-se agora para criar seu perfil personalizado, salvar suas receitas favoritas
                e
                participar ativamente da comunidade Livraria Obras da Vida. Transforme sua paixão pela culinária em uma jornada
                compartilhada de descobertas e sabores.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="blog" class="blog py-5">
    <div class="container">
      <h2 class="text-center mb-4">Nossos livros</h2>
      <div class="row">
        <?php if(count($recipes) > 0) { ?>
        <?php foreach($recipes as $recipe) { ?>
          <div class="col-md-4 mb-4">
            <div class="card h-100">
              <img src="<?php echo $recipe['image']; ?>" alt="Imagem da Receita" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $recipe['title']; ?>
                </h5>
                <p class="card-text">
                  <?php echo $recipe['content']; ?>
                </p>
                <a href="post.php?post_id=<?php echo $recipe['id']; ?>" class="btn btn-color1 text-light stretched-link">Leia mais</a>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php } else { ?>
          <p class="text-center">Nenhuma postagem encontrada.</p>
        <?php } ?>
      </div>
      <div class="text-center mt-4">
        <a href="todas-as-postagens.html" class="btn btn-lg btn-outline-primary">Ver Todas as Postagens</a>
      </div>
    </div>
  </section>
  <section id="cta" class="text-white text-center py-5">
    <div class="container">
      <h2 class="mb-4">Faça parte da nossa comunidade!</h2>
      <p class="lead mb-4">Registre-se agora para ter acesso a receitas exclusivas, interagir com outros chefs e
        compartilhar suas próprias criações.</p>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <a href="cadastro.php" class="btn btn-light btn-lg btn-block">Cadastre-se</a>
        </div>
        <div class="col-md-6">
          <a href="login.php" class="btn btn-outline-light btn-lg btn-block">Login</a>
        </div>
      </div>
    </div>
  </section>


</main>

<?php
  include_once(__DIR__ . '/components/public/footer.php');
?>