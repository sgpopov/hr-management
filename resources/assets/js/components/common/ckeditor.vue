<template>
    <textarea :id="id" :name="name" :value="value"></textarea>
</template>

<script type="text/babel">
    export default {
        props: {
            id: {
                type: String,
                default: 'editor',
                required: true
            },
            name: {
                type: String,
                default: 'editor',
                required: true
            },
            value: {
                type: String
            },
            height: {
                type: String,
                default: '500px',
            },
            toolbar: {
                // Define the toolbar: http://docs.ckeditor.com/#!/guide/dev_toolbar
                type: Array,
                default: () => [
                    {name: 'clipboard', items: ['Undo', 'Redo']},
                    {name: 'styles', items: ['Format', 'Font', 'FontSize']},
                    {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript']},
                    {name: 'basicstyles', items: ['CopyFormatting', 'RemoveFormat']},
                    {name: 'colors', items: ['TextColor', 'BGColor']},
                    {name: 'align', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']},
                    {name: 'links', items: ['Link', 'Unlink']},
                    {name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']},
                    {name: 'insert', items: ['Image', 'Table']},
                    {name: 'tools', items: ['Maximize']},
                    {name: 'editing', items: ['Scayt']},
                    {name: 'document', groups: ['mode', 'document'], items: ['Source', '-', 'Print']}
                ]
            },
            language: {
                type: String,
                default: 'en'
            },
            extraplugins: {
                type: String,
                default: ''
            }
        },

        mounted() {
            const editorId = this.id;
            const editorConfig = {
                toolbar: this.toolbar,
                language: this.language,
                height: this.height,
                extraPlugins: this.extraplugins
            };

            CKEDITOR.replace(editorId, editorConfig);
            CKEDITOR.instances[editorId].setData(this.value);
            CKEDITOR.instances[editorId].on('change', () => this.updateElement(editorId));
        },

        methods: {
            updateElement(editorId) {
                if (CKEDITOR.instances[editorId]) {

                    CKEDITOR.instances[editorId].updateElement();
                }
            },

            destroyed() {
                const ckeditorId = this.id;

                if (CKEDITOR.instances[ckeditorId]) {
                    CKEDITOR.instances[ckeditorId].destroy()
                }
            }
        }
    }
</script>
