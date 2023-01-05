<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <link href="<?php echo asset('css/styles.css') ?>" rel="stylesheet">
    
</head>
<body>
    <!-- <div id="app"> -->
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand" href="<?php echo route('home') ?>"><img src="foto/logo.png" alt="" class="img-fluid"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="<?php echo route('menu.index') ?>"><?php echo __('Menu') ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo route('kupon.index') ?>"><?php echo __('Kupon') ?></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><?php echo __('User') ?></a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>

    <div id="app">
        <!-- Modal for Creating User -->
        <div class="modal fade" id="createUserModalCenter" tabindex="-1" role="dialog" aria-labelledby="createUserModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createUserModalLongTitle">Create Users</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    <!-- <button type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-plus-sign"></span> Create User
                    </button> -->
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name:</label>
                                    <input v-model="name" type="text" class="form-control"  id="name"></input>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email">Email:</label>
                                    <input v-model="email" class="form-control"  id="email"></input>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password">Password :</label>
                                    <input v-model="password" class="form-control"  id="password" type="password"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="createUser">Create</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Updating User -->
        <div class="modal fade" id="updateUserModalCenter" tabindex="-1" role="dialog" aria-labelledby="updateUserModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="updateUserModalCenterLongTitle">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">name:</label>
                                <input v-model="nameUpdate" type="text" class="form-control" name="name" id="nameUpdate"></input>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Email :</label>
                                <input v-model="emailUpdate" class="form-control" name="email" id="emailUpdate"></input>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password">Password</label>
                                <input v-model="passwordUpdate" class="form-control" name="password" id="passwordUpdate" type="text"></input>
                            </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="updateUser">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Deleting User -->
        <div class="modal fade" id="deleteUserModalCenter" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLongTitle">Confirm data deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        Are you sure want to delete this users?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" v-on:click="deleteUser">Yes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="main" class="container">

            <!-- <div class="col-md-12"> -->
                <div class="py-5 text-center">
                    <h2>Kryspresso CRUD Users</h2>
                </div>
                <button type="button" class="mb-4 btn btn-warning" data-toggle="modal" data-target="#createUserModalCenter">
                    Create User
                </button>
               
            <!-- </div> -->

                <div v-if="message" class="alert alert-success" role="alert">
                    {{ message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <table class="table table-striped">
                    <tr>
                        <th scope="col">ID</th>
                        <!-- <th scope="col">No</th> -->
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    <tr v-for="user in users">
                        <td>{{ user.id }}</td>
                        <!-- <td>{{ user.name }}</td> -->
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.password }}</td>
                        <td><button class="btn btn-md btn-warning" v-on:click="getEdit(user)">Edit</button></td>
                        <td><button class="btn btn-danger" v-on:click="getDelete(user)">Delete</button></td>
                    </tr>
                </table>

            </div>
        </div>

            <!-- <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; 2021 HomeCareUnai</p>
            </footer> -->
    </div>


    <!-- Axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        var app = new Vue ({
            el: '#app',
            data: {
                errors: [],
                message: null,
                users:[],
                // testimonyIdUpdate: null,
                userIdDelete: null,
                deleteMode: false,
                name: '',
                nameUpdate: '',
                email:'',
                emailUpdate:'',
                password:'',
                passwordUpdate:'',
            },
            mounted: function() {
                this.getUsers();
            },
            methods: {
                getUsers() {
                    axios.get('http://localhost:8000/api/users')
                        .then(response => {
                            this.users = response.data;
                            console.log(response);
                        })
                        .catch(error => {
                            console.log(error);
                        });
                },

                createUser: function(){
                    //Hide the create modal
                    $('#createUserModalCenter').modal('hide');

                    axios.post('http://localhost:8000/api/users', {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                    })
                    .then(response => {
                            this.getUsers();
                            this.message = "New data has been created";
                            this.resetForm();
                            console.log(response);
                    })
                    .catch(error => {
                            console.log(error);
                    });
                },
                resetForm: function () {
                    this.editMode = false;
                    this.deleteMode = false;
                    this.userIdEdit = null;
                    this.name = null;
                    this.email = null;
                    this.password = null;
                },
                getEdit: function (user) {
                    //Show the update modal
                    $('#updateUserModalCenter').modal('show');
                    this.message = null;
                    this.editMode = true;
                    this.deleteMode = false;
                    this.userIdEdit = user.id;
                    this.nameUpdate = user.name;
                    this.emailUpdate = user.email;
                    this.passwordUpdate = user.pass;
                    
                },
                getDelete: function (user) {
                    //Show the delete modal
                    $('#deleteUserModalCenter').modal('show')
                    this.message = null;
                    this.deleteMode = true;
                    this.editMode = false;
                    this.userIdDelete = user.id;
                },
                updateUser: function () {
                    axios.patch(`http://localhost:8000/api/users/${this.userIdEdit}`, {
                            name: this.nameUpdate,
                            email: this.emailUpdate,
                            password: this.passwordUpdate,

                        })
                        .then(res => {
                            // handle success
                            this.message = "Your data has been updated";
                            //close the update modal
                            $('#updateUserModalCenter').modal('hide');
                            this.resetForm();
                            this.getUsers();
                        })
                        .catch(err => {
                            // handle error
                            console.log(err);
                        })
                },
                // Delete User
                deleteUser: function () {
                    axios.delete(`http://localhost:8000/api/users/${this.userIdDelete}`)
                        .then(res => {
                            // handle success
                            this.message = "Your data has been deleted";
                            //close the delete modal
                            $('#deleteUserModalCenter').modal('hide');
                            this.resetForm();
                            this.getUsers();
                        })
                        .catch(err => {
                            // handle error
                            console.log(err);
                        })
                }
            }
        })

    </script>

</body>
</html>
