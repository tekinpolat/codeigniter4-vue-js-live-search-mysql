<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('static/css/bootstrap.min.css'); ?>" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <title>Codeigniter 4 Mysql Live Search!</title>
  </head>
  <body>
        <div class="container">
            <div class="row" id="app">
                <div class="col-md-12 mt-3">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control text-center text-success" v-model="search" v-on:keyup="searchUser" placeholder="Search ...">
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Code</th>
                                <th scope="col">Gsm No</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="actor in actors">
                                <th>{{actor.id}}      </th>
                                <td>{{actor.name}}    </td>
                                <td>{{actor.surname}} </td>
                                <td>{{actor.code}}    </td>
                                <td>{{actor.gsmno}}    </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url('static/js/vue.js'); ?>"></script>
        <script src="<?php echo base_url('static/js/axios.min.js'); ?>"></script>
        <script>
            const app = new Vue({
                el  : '#app',
                data : {
                    search : '',
                    actors : ''
                },
                methods : {
                    getActors : function(){
                        axios.post('<?php echo base_url('home/allData'); ?>', {
                            search : this.search
                        })
                        .then(function (response) {
                            console.log(response.data)
                            app.actors = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    },
                    searchUser : function(){
                        this.getActors();
                    }
                },
                created(){
                    this.getActors();
                }
            });
        </script>
  </body>
</html>