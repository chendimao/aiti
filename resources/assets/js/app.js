
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('user-follow-button', require('./components/UserFollowButton.vue'));
Vue.component('commend-button', require('./components/CommendButton.vue'));
Vue.component('send-message-button', require('./components/SendMessageButton.vue'));
Vue.component('Comments', require('./components/Comment.vue'));
Vue.component('question-follow-button', require('./components/QuestionFollowButton.vue'));
Vue.component('comment-domain', require('./components/CommentDomain.vue'));


const app = new Vue({
    el: '#app'
});
