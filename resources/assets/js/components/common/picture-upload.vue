<template>
    <div>
        <div class="row m-b-1">
            <div class="col-md-4">
                <input type="file" accept="image/*" @change="setImage" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div style="max-width: 400px; max-height: 300px;" v-if="imgSrc">
                    <vue-cropper
                            ref='cropper'
                            :guides="false"
                            :view-mode="1"
                            drag-mode="crop"
                            :aspect-ratio="1/1"
                            :auto-crop-area="1"
                            :min-container-width="150"
                            :min-container-height="150"
                            :background="false"
                            :rotatable="false"
                            :src="imgSrc"
                            alt=" "
                            :cropmove="cropImage"
                            >
                    </vue-cropper>
                </div>
            </div>

            <div class="col-md-6">
                <img :src="cropImg" style="max-width: 150px; max-height: 150px;" />
                <input type="hidden" name="picture" :value="cropImg" />
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    // Reference: https://github.com/fengyuanchen/cropperjs
    import VueCropper from 'vue-cropperjs';

    export default {
        components: {
            VueCropper
        },

        data() {
            return {
                imgSrc: '',
                cropImg: ''
            }
        },

        methods: {
            setImage (e) {
                const file = e.target.files[0];

                if (!file.type.includes('image/')) {
                    alert('Please select an image file');

                    return;
                }

                if (typeof FileReader === 'function') {
                    const reader = new FileReader();

                    reader.onload = (event) => {
                        this.imgSrc = event.target.result;
                        this.$refs.cropper.replace(event.target.result);
                    };

                    reader.readAsDataURL(file);
                } else {
                    alert('Sorry, FileReader API not supported');
                }
            },

            cropImage() {
                this.cropImg = this.$refs.cropper.getCroppedCanvas().toDataURL();
            }
        }
    }

</script>
