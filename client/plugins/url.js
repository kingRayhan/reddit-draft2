import Url from "url-parse";

export default (context, inject) => {
  inject("parseUrl", fullUrl => {
    const url = new Url(fullUrl);
    console.log(url);
    return url;
  });
};