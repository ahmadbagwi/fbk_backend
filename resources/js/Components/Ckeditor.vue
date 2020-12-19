<template>
  <ckeditor
    :editor="editor"
    :value="value"
    :config="config"
    :tagName="tagName"
    :disabled="disabled"
    @input="event => $emit('input', event)"
  />
</template>
<script>
name: 'ckeditor-nuxt'
let ClassicEditor
let CKEditor

if (process.client) {
  ClassicEditor = require('@ckeditor/ckeditor5-build-classic')
  CKEditor = require('@ckeditor/ckeditor5-vue2')
} else {
  CKEditor = { component : {template:'<div></div>'}}
}


export default {
  components: {
    ckeditor: CKEditor.component
  },
  props: {
    value: {
      type: String,
      required: false
    },
    tagName: {
      type: String,
      required: false,
      default: 'div'
    },
    list: {
      type: String,
      required: false,
      default: ''
    },
    disabled: {
      type: Boolean,
      required: false,
    },
    uploadUrl: {
      type: String,
      required: false,
      default: '/dashboard/upload'
    },
    config: {
      type: Object,
      required: false,
      default: function () {
      }
    }
  },
  data() {
    return {
      editor: ClassicEditor,
    }
  },
};
</script>