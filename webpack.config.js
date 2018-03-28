const PATH = 'mediatheme';

const webpack           = require("webpack"),
      path              = require("path"),
      ExtractTextPlugin = require("extract-text-webpack-plugin"),
      MinifyJs          = require("babel-minify-webpack-plugin"),
      StyleLint         = require('stylelint-webpack-plugin');

module.exports = env => {
  return {
    entry: {
      'main': `./${PATH}/js/main.js`,
      'single': `./${PATH}/js/single.js`,
    },
    output: {
      path: path.resolve(__dirname, `${PATH}/dist`),
      filename: "[name].bundle.js",
    },
    module: {
      rules: [
        {
          enforce: "pre",
          test: /\.js$/,
          exclude: path.resolve(__dirname, "node_modules"),
          use: [
            {
              loader: "babel-loader",
              options: {
                presets: ["env"],
              }
            },
            {
              loader: "eslint-loader",
            },
          ]
        },
        {
          test: /\.css$/,
          exclude: path.resolve(__dirname, "node_modules"),
          use: ExtractTextPlugin.extract({
            use: "css-loader?importLoaders=1"
          })
        },
        {
          test: /\.(sass|scss)$/,
          exclude: path.resolve(__dirname, "node_modules"),
          use: ExtractTextPlugin.extract({
            use: [
              {
                loader: "css-loader",
                options: {
                  sourceMap: env.dev,
                  minimize: env.production,
                }
              },
              {
                loader: "postcss-loader",
                options: {
                  sourceMap: env.dev,
                  plugins: [
                    require("postcss-flexbugs-fixes"),
                    require("autoprefixer"),
                  ]
                }
              },
              {
                loader: "sass-loader",
                options: {
                  sourceMap: env.dev,
                }
              }
            ]
          })
        },
        {
          test: /\.(jpg|png|gif)$/,
          use: [
            {
              loader: 'file-loader',
              options: {
                publicPath: './'
              },
            },
            {
              loader: 'image-webpack-loader',
              options: {
                gifsicle: {
                  interlaced: false,
                },
                optipng: {
                  optimizationLevel: 7,
                },
                pngquant: {
                  quality: '65-90',
                  speed: 4,
                },
                mozjpeg: {
                  progressive: true,
                  quality: 65,
                },
              },
            }
          ]
        },
        {
          test: /\.svg$/,
          use: [
            {
              loader: 'file-loader',
              options: {
                name: 'images/inline-[name].[ext].php',
                publicPath: './',
              }
            },
          ]
        }
      ]
    },
    plugins: [
      new ExtractTextPlugin({
        filename: `[name].bundle.css`,
        allChunks: true,
      }),
      new MinifyJs({}, {
        sourceMap: env.production,
      }),
      new StyleLint({
        configFile: '.stylelintrc',
        content: `./${PATH}/scss`,
        syntax: 'scss',
      }),
    ]
  };
};
