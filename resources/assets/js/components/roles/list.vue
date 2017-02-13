<template>
    <ul class="list-group list-group-fit">
        <li class="list-group-item" v-for="role in roles">
            <div class="media m-b-0">
                <div class="media-body media-left">
                    <p class="m-b-0">
                        <a :href="'/roles/' + role.id + '/edit'">{{ role.name }}</a>
                    </p>

                    <p class="m-b-0">
                        <small>{{ role.description }}</small>
                    </p>

                    <small class="text-muted-light">
                        {{ role.users.length  }} users &bull;
                        {{ role.routes.length }} routes
                    </small>
                </div>
                <div class="media-right">
                    <div class="card-button-wrapper">
                        <div class="dropdown">
                            <a href="javascript:" class="card-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:" class="dropdown-item" @click="confirmDelete(role)">Remove</a>
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
                roles: [],
                alertSettings: {
                    confrim: {
                        type: 'warning',
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this role!',
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
            let roles = _.values(this.list);

            roles = _.sortBy(roles, ['name']);

            this.roles = roles;
        },

        methods: {
            confirmDelete(role) {
                this.alertSettings.confrim['preConfirm'] = function () {
                    return this.$http.delete('/roles/' + role.id);
                }.bind(this);

                this.$swal(this.alertSettings.confrim).then(() => {
                    this.removeUser(role);
                }, (dismissAction) => {
                    if (dismissAction === 'cancel') {
                        this.$swal(this.alertSettings.onCancel).catch(this.$swal.noop);
                    }
                });
            },

            removeUser(role) {
                let index = _.indexOf(this.roles, role);

                this.roles.splice(index, 1);
                this.$swal(this.alertSettings.onSuccess).catch(this.$swal.noop);
            },
        }
    }
</script>
