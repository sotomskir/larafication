'use strict';

const HtmlWebpack = require('html-webpack-plugin');
const path = require('path');
const webpack = require('webpack');
const ChunkWebpack = webpack.optimize.CommonsChunkPlugin;

const rootDir = path.resolve(__dirname, '..');

module.exports = {
    debug: true,
    devServer: {
        contentBase: path.resolve(rootDir, 'dist'),
        port: 9000
    },
    devtool: 'source-map',
    entry: {
        app: [ path.resolve(rootDir, '../../resources/assets', 'bootstrap') ],
        vendor: [ path.resolve(rootDir, '../../resources/assets', 'vendor') ]
    },
    module: {
        loaders: [
            { loader: 'raw', test: /\.(css|html)$/ },
            { exclude: /node_modules/, loader: 'ts', test: /\.ts$/ }
        ]
    },
    output: {
        filename: '[name].bundle.js',
        path: path.resolve(rootDir, 'dist')
    },
    plugins: [
        new ChunkWebpack({
            filename: 'vendor.bundle.js',
            minChunks: Infinity,
            name: 'vendor'
        }),
        new HtmlWebpack({
            filename: 'app.blade.php',
            inject: 'body',
            template: path.resolve(rootDir, 'src', 'app', '../../resources/views/layouts')
        })
    ],
    resolve: {
        extensions: [ '', '.js', '.ts' ]
    }
};
