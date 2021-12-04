/*
 * Author(s): Sehoan Choi (sc8zt), Ryu Patterson (rjp5cc)
 */
import { Injectable } from '@angular/core';
import {
  HttpClient,
  HttpErrorResponse,
  HttpParams,
} from '@angular/common/http';
import { Observable, throwError } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class HttpService {
  apiUrl =
    'https://cs4640.cs.virginia.edu/sc8zt/learning_hanja/exportWordbook.php';
  // apiUrl = 'https://localhost/sc8zt/learning_hanja/exportWordbook.php';
  constructor(private httpClient: HttpClient) {}

  getWordbook(): Observable<any> {
    return this.httpClient.get(this.apiUrl);
  }
}
