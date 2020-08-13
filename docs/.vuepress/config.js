const meta = {
    title: '//* Alle Wetter – Design & Development',
    description: '//* Alle Wetter – Design & Development',
    url: 'https://www.aw-studio.de',
};

let head = [
    [
        'link',
        {
            href:
                '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600|Roboto Mono',
            rel: 'stylesheet',
            type: 'text/css',
        },
    ],
];

module.exports = {
    base: '/',
    title: 'AW – Wiki',
    description: 'description',
    head,
    plugins: [
        [
            'vuepress-plugin-clean-urls',
            {
                normalSuffix: '/',
                indexSuffix: '/',
                notFoundPath: '/404.html',
            },
        ],
    ],
    themeConfig: {
        nav: [
            { text: 'Design', link: '/design/' },
            { text: 'Development', link: '/development/' },
        ],
        sidebar: {
            '/development/': [
                {
                    title: 'PHP',
                    collapsable: false,
                    children: [
                        ['/development/php/best-practises', 'Best Practises'],
                    ],
                },
                {
                    title: 'NGINX',
                    collapsable: false,
                    children: [['/development/nginx/config', 'Config']],
                },
                {
                    title: 'VSCode',
                    collapsable: false,
                    children: [['/development/vscode/config', 'Config']],
                },
            ],
            '/design/': [
                {
                    title: 'Sketch',
                    collapsable: false,
                },
            ],
        },
    },
};
