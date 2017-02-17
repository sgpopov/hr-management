<template>
    <form action="/employees" class="filter form-inline">
        <div class="filter-options">
            <div class="form-group m-r-1">
                <label for="filter-department">Department:</label>
                <select name="department" id="filter-department" class="c-select" v-model="department" @change="onFilterApplied">
                    <option value="">Any</option>
                    <option v-for="department in departments" :value="department.id">{{ department.name }}</option>
                </select>
            </div>

            <div class="form-group m-r-1">
                <label for="filter-team">Team:</label>
                <select name="team" id="filter-team" class="c-select" v-model="team" @change="onFilterApplied">
                    <option value="">Any</option>
                    <option v-for="team in teams" :value="team.id">{{ team.name }}</option>
                </select>
            </div>

            <div class="form-group pull-right">
                <a href="/employees" class="btn btn-primary btn-rounded">
                    Reset
                </a>
            </div>
        </div>
    </form>
</template>

<script type="text/babel">
    export default {
        props: ['departments', 'department', 'teams', 'team'],

        methods: {
            onFilterApplied() {
                let queryParams = {};

                if (this.department) {
                    queryParams['department'] = this.department;
                }

                if (this.team) {
                    queryParams['team'] = this.team;
                }

                window.location.search = this.generateQueryString(queryParams);
            },

            generateQueryString(data) {
                let ret = [];

                for (let d in data) {
                    ret.push(encodeURIComponent(d) + '=' + encodeURIComponent(data[d]));
                }

                return ret.join('&');
            }
        }
    }
</script>
