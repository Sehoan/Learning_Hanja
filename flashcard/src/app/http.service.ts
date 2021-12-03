import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class HttpService {
  // apiUrl =
  // 'https://cs4640.cs.virginia.edu/sc8zt/learning_hanja/account/wordbook?command=export';
  apiUrl = 'https://localhost/sc8zt/learning_hanja/account/export';
  // apiUrl =
  // 'https://localhost/sc8zt/learning_hanja/account/wordbook?command=export';
  constructor(private httpClient: HttpClient) {}

  getWordbook(): Observable<any> {
    return this.httpClient.get(this.apiUrl);
  }
}
