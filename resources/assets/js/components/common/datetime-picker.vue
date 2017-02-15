<template>
    <datepicker
            :format="format"
            :input-class="css"
            :name="inputName"
            :id="inputId"
            :value="inputValue"
            :monday-first="mondayFirst"
            :disabled="disabled"
            :placeholder="inputPlaceholder"
    >
    </datepicker>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';

    export default {
        props: [
            'inputName', 'inputValue', 'inputId', 'inputPlaceholder',
            'dateFormat', 'startsMonday'
        ],

        components: {
            Datepicker
        },

        // Reference: https://github.com/charliekassel/vuejs-datepicker
        data() {
            return {
                format: 'yyyy-MM-dd',
                css: 'datepicker form-control',
                disabled: {
                    from: null,
                    to: null
                },
                mondayFirst: true
            }
        },

        mounted() {
            if (this.dateFormat) {
                this.format = this.dateFormat;
            }

            if (this.startsMonday) {
                this.mondayFirst = this.startsMonday === 'true' ? true : false;
            }

            $('div.datepicker > input.datepicker').css('background-color', 'inherit');
        }
    }
</script>
