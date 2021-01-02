const routes = [
  {
    path: '/forum',
    name: 'forum',
    component: require('./components/Forum/RecentPosts.vue').default
  },
  {
    path: '/post/:postId',
    name: 'post',
    component: require('./components/Forum/Post.vue').default,
    props: true
  },
  {
    path: '/thread/:threadId/:threadTitle',
    name: 'single-thread',
    component: require('./components/Forum/Thread.vue').default,
    props: true
  },
];

export default routes;