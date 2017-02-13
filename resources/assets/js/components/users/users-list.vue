<template>
    <ul class="list-group list-group-fit">
        <li class="list-group-item" v-for="user in users">
            <div class="media m-b-0">
                <div class="media-left media-middle">
                    <a :href="'/users/' + user.id + '/edit'">
                        <img :src="getPicture(user.picture)" :alt="user.name" width="40" class="img-circle" />
                    </a>
                </div>
                <div class="media-body media-middle">
                    <p class="m-b-0">
                        <a :href="'/users/' + user.id + '/edit'">{{ user.name }}</a>
                    </p>

                    <p class="m-b-0">
                        <small>{{ user.email }}</small>
                    </p>

                    <small class="text-muted-light">
                        Last active {{ user.created_at }} &bull;
                        Registered at {{ user.created_at }}
                    </small>
                </div>
                <div class="media-right">
                    <div class="card-button-wrapper">
                        <div class="dropdown">
                            <a href="javascript:" class="card-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:" class="dropdown-item" @click="confirmUserDelete(user)">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</template>

<script type="text/babel">
    export default {
        props: ['list'],

        data() {
            return {
                users: [],
                alertSettings: {
                    confrim: {
                        type: 'warning',
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this user!',
                        showCancelButton: true,
                        showLoaderOnConfirm: true,
                        confirmButtonText: 'Yes, delete it',
                        confirmButtonColor: '#F27474',
                        cancelButtonText: 'No, keep it'
                    },
                    onSuccess: {
                        title: 'Removed',
                        type: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    },
                    onError: {},
                    onCancel: {
                        title: 'Cancelled',
                        type: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    }
                }
            }
        },

        mounted() {
            this.users = _.values(this.list);
        },

        methods: {
            confirmUserDelete(user) {
                this.alertSettings.confrim['preConfirm'] = function () {
                    return this.$http.delete('/users/' + user.id);
                }.bind(this);

                this.$swal(this.alertSettings.confrim).then(() => {
                    this.removeUser(user);
                }, (dismissAction) => {
                    if (dismissAction === 'cancel') {
                        this.$swal(this.alertSettings.onCancel).catch(this.$swal.noop);
                    }
                });
            },

            removeUser(user) {
                let index = _.indexOf(this.users, user);

                this.users.splice(index, 1);
                this.$swal(this.alertSettings.onSuccess).catch(this.$swal.noop);
            },

            getPicture(picture) {
                if (picture) {
                    return '/storage/images/users/' + picture;
                }

                return '/images/avatar.png';
            }
        }
    }
</script>
