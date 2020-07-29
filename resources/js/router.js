import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import StockList from './views/StockList';
import BookList from './views/BookList';
import BookCreate from './views/BookCreate';
import BookEdit from './views/BookEdit';

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
  },
  {
    path: '/home/books/:id/edit',
    component: BookEdit,
    props: route => ({ id: Number(route.params.id) })
  }
];

// VueRouterインスタンスを作成
const router = new VueRouter({
  mode: 'history',
  routes
});

// VueRouterインスタンスをエクスポート
export default router
