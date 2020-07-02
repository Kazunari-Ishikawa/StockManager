import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import TopPage from './views/TopPage';
import StockList from './views/StockList';
import Login from './views/Login';

// ルーティング
const routes = [
  {
    path: '/',
    component: TopPage
  },
  {
    path: '/login',
    component: Login
  },
  {
    path: '/home',
    component: StockList
  }
];

// VueRouterインスタンスを作成
const router = new VueRouter({
  mode: 'history',
  routes
});

// VueRouterインスタンスをエクスポート
export default router
