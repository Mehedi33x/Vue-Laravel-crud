import Validator from "simple-vue-validator";
const Validator = Validator.Validator;

export default {
    install: function (app) {
        app.config.globalProperties.Validator = Validator;
    },
};
