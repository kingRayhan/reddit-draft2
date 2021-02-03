import Url from "url-parse";

export default (_, inject) => {
  inject("parseUrl", fullUrl => {
    const url = new Url(fullUrl);
    return url;
  });
};
