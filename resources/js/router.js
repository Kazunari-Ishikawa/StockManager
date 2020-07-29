import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import StockList from './views/StockList';
import BookList from './views/BookList';
import BookCreate from './views/BookCreate';

// ルーティング
const routes = [
  {
    path: '/home',
    component: StockList
  },
  {
    path: '/home/books',
    component: BookList
  },
  {
    path: '/home/books/new',
    component: BookCreate
  }
];

// VueRouterインスタンスを作成
const router = new VueRouter({
  mode: 'history',
  routes
});

// VueRouterインスタンスをエクスポート
export default router
